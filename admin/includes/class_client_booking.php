<?php

class Client_booking extends Booking {
  
  // properties
  protected static $db_table = "client_bookings";
  protected static $db_table_fields = array('id', 'client_id', 'service_id');
  public $client_id;
  public $service_id;
  public $created_at;
  public $changed_at;
  
  
  
} // end of class


?>