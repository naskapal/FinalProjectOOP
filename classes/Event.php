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

  public function event_details($value)
  {
    return $this->_db->get_info('event','eventID',$value);
  }
  public function get_price($value)
  {
    $price = $this->_db->get_info('ticket','eventID',$value);
    return $price['price'];
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

}

 ?>
