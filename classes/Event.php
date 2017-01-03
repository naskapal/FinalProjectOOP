<?php

class Event{

  private $_db;

  public function __construct()
  {
    $this->_db = Database::getInstance();
  }

  public function event_list()
  {
    return $this->_db->select('event');
  }

  public function event_list_club($value)
  {
    $value = 'clubID = "'.$value.'"';
    return  $this->_db->select('event','*',NULL, $value, NULL, NULL,NULL);
  }

  public function event_details($value)
  {
    return $this->_db->get_info('event','eventID',$value);
  }

  public function get_price($value)
  {
    $price = $this->_db->get_info('ticket','eventID',$value);
    return $price['price'];
  }

  public function get_point($value)
  {
    $price = $this->_db->get_info('event','eventID',$value);
    return $price['point'];
  }

  public function ticket_details($value)
  {
    $value = 'eventID = "'.$value.'"';
    $result =  $this->_db->select('ticket','*',NULL, $value, NULL, 1,NULL);

    while($row = $result->fetch_assoc())
    {
      return $row;
    }
  }

  public function post_event($fields = array())
  {
    if($this->_db->insert('event',$fields)) return true;
    else return false;
  }

  public function create_ticket($fields = array())
  {
    if($this->_db->insert('ticket',$fields)) return true;
    else return false;
  }

  public function cek_event($username)
  {
    $data = $this->_db->get_info('event', 'eventID', $username);

    if(empty($data)) return false;
    else return true;
  }

}

 ?>
