<?php

class Admin{

  private $_db;

  public function __construct()
  {
    $this->_db = Database::getInstance();
  }

  public function register_admin($fields = array())
  {
    if($this->_db->insert('administrator',$fields)) return true;
    else return false;
  }

  public function update_admin($fields = array(), $id)
  {
    if($this->_db->update('administrator', $fields, $id, 'username')) return true;
    else return false;
  }

  public function is_LoggedIn()
  {
    if(Session::exist('username')) return true;
    else return false;
  }

  public function admin_list()
  {
    return $this->_db->select('administrator');
  }

  public function login_admin($username, $password)
  {
    $data = $this->_db->get_info('administrator', 'username', $username);

    if(password_verify($password, $data['password']))
      return true;
    else return false;
  }

  public function cek_name($username)
  {
    $data = $this->_db->get_info('administrator', 'username', $username);

    if(empty($data)) return false;
    else return true;
  }

  public function admin_details($value)
  {
    return $this->_db->get_info('administrator','username',$value);
  }

  public function generateWalletCode($nominal)
	{
		$strings = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$generatedCode = '';
		$length = 12;
		for ($i = 0; $i < ($length);  $i++)
		{
			$generatedCode .= $strings[rand(0, 35)];
		}
		$this->saveWalletCode($nominal, $generatedCode);
		return $generatedCode;
	}

	public function saveWalletCode($nominal, $walletCode)
	{	$dbValues = array('wallet_Code' =>$walletCode,'nominal' =>$nominal, 'adminID' => 'asd1');
    $adminID = 'asd1';
    if ($this->_db->insert('wallet',$dbValues))
    return true;
    else return false;
  }
  public function get_nominal($code)
  {
    $data = $this->_db->get_info('wallet', 'wallet_code', $code);
    return $data['nominal'];
  }
  public function delete_code($code)
  {
    if($this->_db->delete('wallet', 'wallet_code', $code)) return true;
    else return false;
  }
  public function delete_event($code)
  {
    if($this->_db->delete('event', 'eventID', $code)) return true;
    else return false;
  }
  public function delete_ticket($code)
  {
    if($this->_db->delete('ticket', 'ticketID', $code)) return true;
    else return false;
  }
  public function cek_voucher($code)
  {
    if($this->_db->get_info('wallet', 'wallet_code', $code)) return true;
    else return false;
  }
  public function insert_top_up($fields = array())
  {
    var_dump($fields);
    if($this->_db->insert('topup', $fields)) return true;
    else return false;
  }

}
 ?>
