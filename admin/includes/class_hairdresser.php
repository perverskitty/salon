<?php

class Hairdresser extends User {
  
  
  // returns role name
  public function role_name() {
    if ($this->role_id == 1) {
      return "Manager";
    } elseif ($this->role_id == 2) {
      return "Hairdresser";
    } else {
      return "Not staff!";
    }
  } 


  
} // end of class

?>