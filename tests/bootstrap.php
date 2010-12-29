<?php
define("PROJECT_ROOT", realpath(dirname(__FILE__)."/../")."/");
if (!defined("JAOSS_ROOT")) {
    define("JAOSS_ROOT", PROJECT_ROOT ."jaoss/");
}
set_include_path(get_include_path() . PATH_SEPARATOR . PROJECT_ROOT);
set_include_path(get_include_path() . PATH_SEPARATOR . JAOSS_ROOT);
ini_set("display_errors", 1);
error_reporting(E_ALL ^ E_STRICT);

date_default_timezone_set("Europe/London");

include("library/Smarty/libs/Smarty.class.php");
include("library/core_exception.php");
include("library/email.php");
include("library/file.php");
include("library/validate.php");
include("library/error_handler.php");
include("library/flash_messenger.php");
include("library/log.php");
include("library/path.php");
include("library/path_manager.php");
include("library/request.php");
include("library/response.php");
include("library/controller.php");
include("library/settings.php");
include("library/database.php");
include("library/table.php");
include("library/object.php");
include("library/app.php");
include("library/app_manager.php");
include("library/session.php");
include("library/utils.php");

Settings::setMode("test");

include("library/boot.php");
include("library/load_apps.php");

date_default_timezone_set(Settings::getValue("site", "timezone"));

require_once("library/test/phpunit_test_controller.php");
require_once("library/test/selenium_test_controller.php");
require_once("library/test/test_request.php");
