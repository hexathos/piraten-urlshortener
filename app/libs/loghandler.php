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

$loader = require_once LIB_DIR.'/3rdparty/autoload.php';
$loader->add('Monolog\\',LIB_DIR.'/3rdparty/monolog/src');
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;
    const APP_DEBUG = 100;
    const APP_INFO = 200;
    const APP_NOTICE = 250;
    const APP_WARNING = 300;
    const APP_ERROR = 400;
    const APP_CRITICAL = 500;
    const APP_ALERT = 550;
    const APP_EMERGENCY = 600;

class LogHandlerClass
{
    public $logger = null;
    public $dblogger = null;
    public $linklogger = null;

	function __construct()
	{
        if($this->logger==null)
        {
            $this->logger = new Logger('ppgp');

            $this->logger->pushHandler(new StreamHandler(LOG_DIR.'/debug.log', Logger::DEBUG,false));
            $this->logger->pushhandler(new StreamHandler(LOG_DIR.'/info.log', Logger::INFO,false));
            $this->logger->pushHandler(new StreamHandler(LOG_DIR.'/notice.log', Logger::NOTICE,false));
            $this->logger->pushHandler(new StreamHandler(LOG_DIR.'/warning.log', Logger::WARNING,false));
            $this->logger->pushHandler(new StreamHandler(LOG_DIR.'/error.log', Logger::ERROR,false));
            $this->logger->pushHandler(new StreamHandler(LOG_DIR.'/critical.log', Logger::CRITICAL,false));
            $this->logger->pushHandler(new StreamHandler(LOG_DIR.'/alert.log', Logger::ALERT,false));
            $this->logger->pushHandler(new StreamHandler(LOG_DIR.'/emergency.log', Logger::EMERGENCY,false));

        }


        if($this->linklogger==null)
        {
            $this->linklogger = new Logger('ppgp-links');

            $this->linklogger->pushHandler(new StreamHandler(LOG_DIR.'/links.debug.log', Logger::DEBUG,false));
            $this->linklogger->pushhandler(new StreamHandler(LOG_DIR.'/links.info.log', Logger::INFO,false));
            $this->linklogger->pushHandler(new StreamHandler(LOG_DIR.'/links.notice.log', Logger::NOTICE,false));
            $this->linklogger->pushHandler(new StreamHandler(LOG_DIR.'/links.warning.log', Logger::WARNING,false));
            $this->linklogger->pushHandler(new StreamHandler(LOG_DIR.'/links.error.log', Logger::ERROR,false));
            $this->linklogger->pushHandler(new StreamHandler(LOG_DIR.'/links.critical.log', Logger::CRITICAL,false));
            $this->linklogger->pushHandler(new StreamHandler(LOG_DIR.'/links.alert.log', Logger::ALERT,false));
            $this->linklogger->pushHandler(new StreamHandler(LOG_DIR.'/links.emergency.log', Logger::EMERGENCY,false));

        }

        if($this->dblogger==null)
        {
            $this->dblogger = new Logger('doctrine');

            $this->dblogger->pushHandler(new StreamHandler(LOG_DIR.'/doctrine_debug.log', Logger::DEBUG,false));
            $this->dblogger->pushhandler(new StreamHandler(LOG_DIR.'/doctrune_info.log', Logger::INFO,false));
            $this->dblogger->pushHandler(new StreamHandler(LOG_DIR.'/doctrine_notice.log', Logger::NOTICE,false));
            $this->dblogger->pushHandler(new StreamHandler(LOG_DIR.'/doctrine_warning.log', Logger::WARNING,false));
            $this->dblogger->pushHandler(new StreamHandler(LOG_DIR.'/doctrine_error.log', Logger::ERROR,false));
            $this->dblogger->pushHandler(new StreamHandler(LOG_DIR.'/doctrine_critical.log', Logger::CRITICAL,false));
            $this->dblogger->pushHandler(new StreamHandler(LOG_DIR.'/doctrine_alert.log', Logger::ALERT,false));
            $this->dblogger->pushHandler(new StreamHandler(LOG_DIR.'/doctrine_emergency.log', Logger::EMERGENCY,false));

        }

	}

    private function ClearPassword($data)
    {

        if(is_array($data))
        {
            foreach($data as $key => $value)
            {
                $data[$key] = $this->ClearPassword($value);
            }
        }
        else
        {
            if(isset($data["password"]))
            {
                $data["password"] = sprintf("**** SECRET WITH %s CHARS ****", strlen($data["password"]));
            }
        }

        return $data;

    }


    public function addInformations($context)
    {
        if(!isset($context["sessionid"])) { $context["sessionid"] =  session_id();}

        return $context;
    }
	public function getLogger()
	{
		return $this->logger;
	}

    public function getDbLogger()
    {
        return $this->dblogger;
    }

    public function Log($message,$level=200,$context = array())
    {
        $context = $this->addInformations($context);
        $this->logger->addRecord($level,$message, $context);
    }
    public function LogLink($message,$level=200,$context = array())
    {
        $context = $this->addInformations($context);
        $this->linklogger->addRecord($level,$message, $context);
    }

    public function LogDb($message,$level=200,$context = array())
    {
        $context = $this->addInformations($context);
        $this->dblogger->addRecord($level,$message,$context);
    }

}
