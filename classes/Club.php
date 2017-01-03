<?php

class Club{

  private $_db;

  public function __construct()
  {
    $this->_db = Database::getInstance();
  }

  public function club_list()
  {
    return $this->_db->select('club');
  }

  public function club_details($value)
  {
    return $this->_db->get_info('club','club_id',$value);
  }

  public function club_details_profile($value)
  {
    return $this->_db->get_info('club','username',$value);
  }

  public function login_club($username, $password)
  {
    $data = $this->_db->get_info('club', 'username', $username);

    if(password_verify($password, $data['password']))
      return true;
    else return false;
  }

  public function cek_name($username)
  {
    $data = $this->_db->get_info('club', 'username', $username);

    if(empty($data)) return false;
    else return true;
  }

  public function update_club($fields, $id)
  {
    if($this->_db->update('club', $fields, $id, 'club_id')) return true;
    else return false;
  }

}

 ?>
