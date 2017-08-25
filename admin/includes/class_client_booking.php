<?php

class Client_booking extends Db_object {
  
  // properties
  protected static $db_table = "client_bookings";
  protected static $db_table_fields = array('booking_id', 'client_id', 'service_id');
  public $booking_id;
  public $client_id;
  public $service_id;
  public $created_at;
  public $changed_at;
  
  
  
} // end of class


?>