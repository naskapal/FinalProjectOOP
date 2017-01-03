<?php

class Validation{

  private $_passed = false,
          $_errors = array();

  public function check($items = array())
  {
      foreach ($items as $item => $rules)
      {
          foreach ($rules as $rule => $rule_value)
          {
            switch ($rule) {
              // case 'min':
              //   if(strlen(Input::get($item)) < $rule_value){
              //     $this->addError($item,"$item minimal $rule_value character!");
              //   }
              //   break;
              case 'max':
                if(strlen(Input::get($item)) > $rule_value){
                  $this->addError($item,"$item maximal $rule_value Character!");
                }
                break;
              case 'required':
                if(trim(Input::get($item)) == false){
                  $this->addError($item,"$item must be filled");
                }
                break;
              case 'match':
                if(Input::get($item) != Input::get($rule_value)){
                  $this->addError($item,"$item must same with $rule_value ");
                }
                break;
              default:
                # code...
                break;
            }
          }
      }//end first foreach

      if(empty($this->_errors))
      {
        $this->_passed = true;
      }
      return $this;
  }

  private function addError($name,$error)
  {
    $this->_errors[$name] = $error;
  }

  public function errors()
  {
    return $this->_errors;
  }

  public function passed()
  {
    return $this->_passed;
  }



}
 ?>
