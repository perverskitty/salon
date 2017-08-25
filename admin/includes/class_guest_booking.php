<?php

class Guest_booking extends Db_object {
  
  // properties
  protected static $db_table = "guest_bookings";
  protected static $db_table_fields = array('booking_id', 'service_id', 'guest_name', 'guest_tel');
  public $booking_id;
  public $service_id;
  public $guest_name;
  public $guest_tel;
  public $created_at;
  public $changed_at;
  
  
  
} // end of class


?>