<?php

class Client_booking extends Booking {
  
  // properties
  protected static $db_table = "bookings";
  protected static $db_table_fields = array('booking_date', 'start_time', 'end_time', 'hairdresser_id', 'activity_id', 'booking_text', 'client_id', 'service_id');
  public $client_id;
  public $service_id;
  
  
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
    // user did not select a service
    if ($this->service_id == 0) {
      Message::setMsg("Please select a service", "error");
      return false;
    } 
    // user did not select a client
    if ($this->client_id == 0) {
      Message::setMsg("Please select a client", "error");
      return false;
    } 
    // user selected a client who has three active bookings already
    if ($this->count_active_bookings() >= 3) {
      Message::setMsg("Client already has 3 active bookings", "error");
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
  
  
  // checks for an available hairdresser schedule
  protected function schedule_open() {
    $service = Service::find_by_id($this->service_id);
    $minutes = minutes($service->duration);
    $this->end_time = date('H:i:s', strtotime($this->start_time." + ".$minutes." minutes"));
    
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
  
  
  // count active bookings
  protected function count_active_bookings() {
    global $database;
    date_default_timezone_set("Europe/London");
    $date_today = date("Y-m-d");
    $time_today = date("H:i:s");
    
    $sql = "SELECT COUNT(*) FROM bookings WHERE ";
    $sql .= "client_id =". $this->client_id ." AND ";
    $sql .= "booking_date > '". $date_today ."'";
    $result_set = $database->query($sql);
    $row = mysqli_fetch_array($result_set);
    return array_shift($row);
  }
  
  
  
} // end of class


?>