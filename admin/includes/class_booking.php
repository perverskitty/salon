<?php

class Booking extends Db_object {
  
  // properties
  protected static $db_table = "bookings";
  protected static $db_table_fields = array('booking_date', 'start_time', 'end_time', 'hairdresser_id', 'activity_id', 'booking_text');
  public $id;
  public $booking_date;
  public $start_time;
  public $end_time;
  public $hairdresser_id;
  public $activity_id;
  public $booking_text;
  public $created_at;
  public $changed_at;
  
  
} // end of class


?>