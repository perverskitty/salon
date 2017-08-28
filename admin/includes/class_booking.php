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
  
  
  // validate form inputs and check avalability
  public function validate() {
    date_default_timezone_set("Europe/London");
    $date_today = date("Y-m-d");
    $time_today = date("H:i:s");
    
    // user did not select a hairdresser
    if ($this->hairdresser_id == 0) {
      Message::setMsg("Please select a hairdresser", "error");
      return false;
    } 
    // user did not select an activity
    if ($this->activity_id == 0) {
      Message::setMsg("Please select an activity", "error");
      return false;
    } 
    // user did not select a booking date
    if ($this->booking_date == 0) {
      Message::setMsg("Please select a date", "error");
      return false;
    } 
    // user selected a booking date less than the current date
    if ($this->booking_date < $date_today) {
      Message::setMsg("Please select a valid date", "error");
      return false;
    }
    // user did not select a start time
    if ($this->start_time == 0) {
      Message::setMsg("Please select a start time", "error");
      return false;
    } 
    // user selected a start time less than the current time for a date in the past
    if ($this->start_time <= $time_today && $this->booking_date <= $date_today) {
      Message::setMsg("Please select a valid start time", "error");
      return false;
    } 
    // user did not select an end time
    if ($this->end_time == 0) {
      Message::setMsg("Please select an end time", "error");
      return false;
    } 
    // user selected an end time less than the start time
    if ($this->end_time <= $this->start_time) {
      Message::setMsg("Please select a valid end time", "error");
      return false;
    } 
    // user selected an end time less than the current time for a date in the past
    if ($this->end_time <= $time_today && $this->booking_date <= $date_today) {
      Message::setMsg("Please select a valid end time", "error");
      return false;
    } 
    // the salon is closed for the selected booking date and start time
    if ($this->salon_open() == false) {
      Message::setMsg("The salon is closed for this date and/or time", "error");
      return false;
    }
    // the selected booking date and time does not fall within any of the selected hairdresser's schedules
    if ($this->schedule_open() == false) {
      Message::setMsg("The hairdresser is not working for this date and/or time", "error");
      return false;
    }
    // the selected booking date and times clashes with an existing booking
    if ($this->booking_open() == false) {
      Message::setMsg("There is a clash with an existing booking", "error");
      return false;
    }
    
    return true;
  }
  
  
  // checks for open times 
  protected function salon_open() {
    $day = date("w", strtotime($this->booking_date));
    $day = $day + 1;
    
    $sql = "SELECT * FROM open_times WHERE ";
    $sql .= "day_id =". $day ." AND ";
    $sql .= "open_time <= '". $this->start_time ."' AND ";
    $sql .= "close_time > '". $this->start_time ."' AND ";
    $sql .= "first_date <= '". $this->booking_date ."' AND ";
    $sql .= "last_date >= '". $this->booking_date ."'";
    
    $result = Open_time::find_by_query($sql);
  
    return !empty($result) ? true : false;  
  } 
  
  
  // checks for an available hairdresser schedule
  protected function schedule_open() {
    $day = date("w", strtotime($this->booking_date));
    $day = $day + 1;
    
    $sql = "SELECT * FROM schedules WHERE ";
    $sql .= "hairdresser_id =". $this->hairdresser_id ." AND ";
    $sql .= "day_id =". $day ." AND ";
    $sql .= "start_time <= '". $this->start_time ."' AND ";
    $sql .= "end_time > '". $this->start_time ."' AND ";
    $sql .= "end_time >= '". $this->end_time ."' AND ";
    $sql .= "first_date <= '". $this->booking_date ."' AND ";
    $sql .= "last_date >= '". $this->booking_date ."'";
    
    $result = Schedule::find_by_query($sql);
  
    return !empty($result) ? true : false;  
  }
  
  
  // checks for an available booking slot 
  protected function booking_open() {
    
    $sql = "SELECT * FROM bookings WHERE ";
    $sql .= "(hairdresser_id = ". $this->hairdresser_id ." AND ";
    $sql .= "booking_date = '". $this->booking_date ."' AND ";
    $sql .= "start_time < '". $this->end_time ."' AND ";
    $sql .= "end_time >= '". $this->end_time ."') OR ";
    $sql .= "(hairdresser_id = ". $this->hairdresser_id ." AND ";
    $sql .= "booking_date = '". $this->booking_date ."' AND ";
    $sql .= "start_time <= '". $this->start_time ."' AND ";
    $sql .= "end_time > '". $this->start_time ."')";
    
    $result = Booking::find_by_query($sql);
    
    return empty($result) ? true : false; 
  }
  
  
} // end of class


?>