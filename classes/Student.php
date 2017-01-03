<?php

class Student{

  private $_db;

  public function __construct()
  {
    $this->_db = Database::getInstance();
  }

  public function register_student($fields = array())
  {
    if($this->_db->insert('student',$fields)) return true;
    else return false;
  }

  public function login_student($username, $password)
  {
    $data = $this->_db->get_info('student', 'username', $username);

    if(password_verify($password, $data['password']))
      return true;
    else return false;
  }

  public function cek_name($username)
  {
    $data = $this->_db->get_info('student', 'username', $username);

    if(empty($data)) return false;
    else return true;
  }

  public function student_details($value)
  {
    return $this->_db->get_info('student','username',$value);
  }

  public function is_LoggedIn()
  {
    if(Session::exist('username')) return true;
    else return false;
  }

  public function get_data($username)
  {
    if($this->cek_name($username))
      return $this->_db->get_info('student', 'username', $username);
    else
      return die('Username Not Registered');
  }

  public function update_student($fields = array(), $id)
  {
    if($this->_db->update('student', $fields, $id, 'nim')) return true;
    else return false;
  }

  public function transaction($fields = array())
  {
    if($this->_db->insert('tickettrans',$fields)) return true;
    else return false;
  }

  public function cek_transaction($nim, $event)
  {
    //not finished
    $value = 'nim = "'.$nim.'"';
    $event = 'eventID = "'.$event.'"';

    if($this->_db->select('tickettrans','*',NULL, $value, NULL, 1,NULL, $event)) return true;
    else return false;
  }



}
 ?>
