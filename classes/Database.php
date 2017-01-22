<?php

/**
 *
 */
class Database
{
  private static $INSTANCE = null;
  private $mysqli,
          $HOST   = 'localhost',
          $USER   = 'root',
          $PASS   = '',
          $DBNAME = 'SCEM2';

  private function __construct()
  {
    $this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
    if(mysqli_connect_error())
    {
      die('connection Fail');
    }
  }

  public static function getInstance()
  {
    if(!isset(self::$INSTANCE)){
      self::$INSTANCE = new Database();
    }

    return self::$INSTANCE;
  }

  public function insert($table, $fields = array())
  {
    $column = implode(", ", array_keys($fields));

    $valueArrays = array();
    $i = 0;
    foreach ($fields as $key => $values) {
      if(is_int($values)){
        $valueArrays[$i] = $this->escape($values);
      }else{
        $valueArrays[$i] = "'".$this->escape($values)."'";
      }
      $i++;
    }

    $values = implode(",", $valueArrays);

    $query = "INSERT INTO $table ($column) VALUES ($values)";

    // die($query);

    return $this->run_query($query, 'Input Failed!');
  }

  public function select($table, $row = '*', $join = null, $where = null, $order = null, $limit = null, $and = null)
    {
        $query = 'SELECT '.$row.' FROM '.$table;

        if($join != null)
        {
            $query .= ' JOIN '.$join;
        }

        if($where != null)
        {
            $query .= ' WHERE '.$where;
        }

        if($limit != null)
        {
            $query .= ' LIMIT '.$limit;
        }

        if($and != null)
        {
          $query .= ' AND '.$and;
        }


        return $this->mysqli->query($query);

    }

  public function update($table, $fields, $id, $primary)
  {
    $valueArrays = array();
    $i = 0;
    foreach ($fields as $key => $values) {
      if(is_int($values)){
        $valueArrays[$i] = $key ."=". $this->escape($values);
      }else{
        $valueArrays[$i] = $key ."='".$this->escape($values)."'";
      }
      $i++;
    }

    $id = "'$id'";
    $values = implode(",", $valueArrays);


    $query = "UPDATE $table SET $values WHERE $primary=$id";

    // die($query);

    return $this->run_query($query, 'Update Failed!');
  }

  public function delete($table, $column, $value)
  {

    if(!is_int($value))
    {
      $value = "'".$value."'";
    }

    $query = "DELETE FROM $table WHERE $column = $value";
    // die($query);
    return $this->run_query($query, 'Delete Failed!');
  }

  public function run_query($query, $msg)
  {
    if($this->mysqli->query($query) or die ($msg)) return true;
    else return false;
  }

  public function escape($name)
  {
    return $this->mysqli->real_escape_string($name);
  }

  public function get_info($table, $column, $value)
  {
    if(!is_int($value))
    {
      $value = "'".$value."'";
    }

    $query = "SELECT * FROM $table WHERE $column = $value";

    // die($query);

    $result = $this->mysqli->query($query);
    while($row = $result->fetch_assoc())
    {
      return $row;
    }
  }

}
 ?>
