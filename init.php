<?php

ob_start();

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', DS . 'xampp' . DS . 'htdocs' . DS . 'MVC_Magebit');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS);

require_once(INCLUDES_PATH.DS."helpers/functions.php");
require_once(INCLUDES_PATH.DS."config/config.php");
require_once(INCLUDES_PATH.DS."helpers/database.php");
require_once(INCLUDES_PATH.DS."models/db_object.php");
require_once(INCLUDES_PATH.DS."views/header.php");
require_once(INCLUDES_PATH.DS."models/subscriber.php");
require_once(INCLUDES_PATH.DS."views/subscribers_view.php");
require_once(INCLUDES_PATH.DS."controllers/email.php");
require_once(INCLUDES_PATH.DS."controllers/form.php");
require_once(INCLUDES_PATH.DS."models/session.php");

?>