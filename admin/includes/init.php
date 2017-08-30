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
require_once(INCLUDES_PATH.DS."class.database.php");
require_once(INCLUDES_PATH.DS."class.message.php");
require_once(INCLUDES_PATH.DS."class.db_object.php");
require_once(INCLUDES_PATH.DS."class.user.php");
require_once(INCLUDES_PATH.DS."class.hairdresser.php");
require_once(INCLUDES_PATH.DS."class.client.php");
require_once(INCLUDES_PATH.DS."class.service.php");
require_once(INCLUDES_PATH.DS."class.schedule.php");
require_once(INCLUDES_PATH.DS."class.booking.php");
require_once(INCLUDES_PATH.DS."class.client_booking.php");
require_once(INCLUDES_PATH.DS."class.guest_booking.php");
require_once(INCLUDES_PATH.DS."class.activity.php");
require_once(INCLUDES_PATH.DS."class.category.php");
require_once(INCLUDES_PATH.DS."class.day.php");
require_once(INCLUDES_PATH.DS."class.role.php");
require_once(INCLUDES_PATH.DS."class.open_time.php");
require_once(INCLUDES_PATH.DS."class.session.php");
require_once(INCLUDES_PATH.DS."class.paginate.php");

?>