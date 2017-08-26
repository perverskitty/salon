<?php

class Hairdresser extends User {
  
  
  // return hairdresser's name
  public static function name($id) {
    $the_hairdresser = self::find_by_id($id);
    return !empty($the_hairdresser) ? $the_hairdresser->first_name.' '.$the_hairdresser->last_name : false;
  }

  
} // end of class

?>