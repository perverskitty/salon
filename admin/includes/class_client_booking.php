<?php

class Client_booking extends Booking {
  
  // properties
  protected static $db_table = "bookings";
  protected static $db_table_fields = array('booking_date', 'start_time', 'end_time', 'hairdresser_id', 'activity_id', 'booking_text', 'client_id', 'service_id');
  public $client_id;
  public $service_id;
  
  
  
} // end of class


?>