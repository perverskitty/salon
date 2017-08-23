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
  
  
  // next page number
  public function next() {
    return $this->current_page + 1;
  }
  
  
  // previous page number
  public function previous() {
    return $this->current_page - 1;
  }
  
  
  // total number of pages
  public total_pages() {
    return ceil($this->items_total_count / $this->items_per_page);
  }
  
  
} // end of class

?>