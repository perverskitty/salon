<?php

class Guest_booking extends Booking {
  
  // properties
  protected static $db_table = "guest_bookings";
  protected static $db_table_fields = array('id', 'service_id', 'guest_name', 'guest_tel');
  public $service_id;
  public $guest_name;
  public $guest_tel;
  public $created_at;
  public $changed_at;
  
  
  
} // end of class


?>