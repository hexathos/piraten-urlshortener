<?php
/**
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This Software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

define('LIB_DIR', dirname(__FILE__) );
define('APP_DIR', LIB_DIR.'/..' );
define('ROOT_DIR', LIB_DIR.'/../..' );
define('LOG_DIR', ROOT_DIR.'/logs' );

date_default_timezone_set('Europe/Berlin');
ini_set("display_errors", TRUE);
error_reporting(E_ALL);// ^ E_NOTICE ^ E_WARNING);

include ( LIB_DIR  .'/config.loader.php');
require ( LIB_DIR . '/3rdparty/smarty/libs/Smarty.class.php');
require ( LIB_DIR . '/loghandler.php');

$LogHandler = new LogHandlerClass();

use Doctrine\Common\ClassLoader;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL as ORM;

require ( LIB_DIR.'/3rdparty/doctrine-dbal/Doctrine/Common/ClassLoader.php');


$classLoader = new ClassLoader('Doctrine', LIB_DIR.'/3rdparty/doctrine-dbal/');
$classLoader->register();
require ( LIB_DIR . '/loghandler-doctrine.php');
$doctrineConfig = new \Doctrine\DBAL\Configuration();

$databaseLogger = new IPSDebugStack($LogHandler);
$doctrineConfig->setSQLLogger($databaseLogger );

$doctrineConnectionParams = array(
                                  'dbname' => $config["db"]["name"],
                                  'user' => $config["db"]["user"],
                                  'password' => $config["db"]["pass"],
                                  'host' => $config["db"]["host"],
                                  'driver' => $config["db"]["driver"],
);

$doctrineConnection = DriverManager::getConnection($doctrineConnectionParams, $doctrineConfig);
$doctrineConnection->driverOptions = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require ( LIB_DIR .'/dbos/BaseObject.dbo.php');
require ( LIB_DIR .'/ipsmith_autoload.php');
require ( LIB_DIR .'/helper_functions.php');


$smarty = new Smarty;

$smarty->debugging = $config["template"]["debugging"];
$smarty->caching = $config["template"]["caching"];
$smarty->force_compile = $config["template"]["force_compile"];
$smarty->use_sub_dirs = $config["template"]["use_sub_dirs"];
$smarty->cache_lifetime = $config["template"]["cache_lifetime"];
$smarty->template_dir = APP_DIR.'/templates';
$smarty->cache_dir = ROOT_DIR . '/cache/templates/caching';
$smarty->compile_dir = ROOT_DIR .'/cache/templates/compile';

session_name($config["appidentifier"]);
session_start();
$sessionid = session_id();

if(empty($sessionid) || !isset($_SESSION["userdata"]))
{
  session_start();
  $_SESSION["userdata"] = array();
  $_SESSION["userdata"]["id"] = 0;
  $_SESSION["userdata"]["username"] = "guest";
  $_SESSION["userdata"]["language"] = "en";
  $_SESSION["userdata"]["config"] = $config["defaultsettings"];
}

if(isset($_REQUEST["from"]))
{
$LogHandler->Log("Current Session-data", IPSMITH_INFO, array('data-session'=>$_SESSION));

}