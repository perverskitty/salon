<?

class Paginate {
  
  // properties
  public $current_page;
  public $items_per_page;
  public $items_total_count;
  
  
  // constructor
  public function __construct($page=1, $items_per_page=20, $items_total_count=0) {
    $this->current_page = (int)$page;
    $this->items_per_page = (int)$items_per_page;
    $this->items_total_count = (int)$items_total_count;
  }
  
  
  
  
  
} // end of class

?>