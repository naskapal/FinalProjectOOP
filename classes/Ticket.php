<?php

class Ticket
  {
    private $_db;

    public function __construct()
    {
      $this->_db = Database::getInstance();
    }

    public function ticketTrans_list()
    {
      return $this->_db->select('tickettrans');
    }

    public function ticket_detail($id)
    {
      return $this->_db->get_info('tickettrans', 'transID', $id);
    }

  }





 ?>
