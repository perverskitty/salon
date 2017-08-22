<?php


// autoloads undeclared classes
function class_autoloader($class) {
  $class = strtolower($class);
  $the_path = "includes/class_{$class}.php";
  
  // if a regular file and class has not been defined  
  if (is_file($the_path) && !class_exists("class_{$class}")) {
    require_once($the_path);
  } 
}
spl_autoload_register('class_autoloader');





?>