<?php

// constants for path management
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'Applications'.DS.'MAMP'.DS.'htdocs'.DS.'salon');
defined('ADMIN_PATH') ? null : define('ADMIN_PATH', SITE_ROOT.DS.'admin');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

// include functions
require_once(INCLUDES_PATH.DS."functions.php");

// include database connection constants
require_once(INCLUDES_PATH.DS."config.php");

// include classes
require_once(INCLUDES_PATH.DS."class_database.php");
require_once(INCLUDES_PATH.DS."class_db_object.php");
require_once(INCLUDES_PATH.DS."class_user.php");
require_once(INCLUDES_PATH.DS."class_hairdresser.php");
require_once(INCLUDES_PATH.DS."class_client.php");
require_once(INCLUDES_PATH.DS."class_session.php");
require_once(INCLUDES_PATH.DS."class_paginate.php");

?>