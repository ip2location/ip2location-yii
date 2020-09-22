<?php
namespace IP2LocationYii;

use Yii;

// Web Service Settings
if(!defined('IP2LOCATION_API_KEY')) {
	define('IP2LOCATION_API_KEY', 'demo');
}

if(!defined('IP2LOCATION_PACKAGE')) {
	define('IP2LOCATION_PACKAGE', 'WS1');
}

if(!defined('IP2LOCATION_USESSL')) {
	define('IP2LOCATION_USESSL', false);
}

if(!defined('IP2LOCATION_ADDONS')) {
	define('IP2LOCATION_ADDONS', []);
}

if(!defined('IP2LOCATION_LANGUAGE')) {
	define('IP2LOCATION_LANGUAGE', 'en');
}


class IP2Location_Yii
{

    public function get($ip, $query = array())
    {
        $obj = new \IP2Location\Database(IP2LOCATION_DATABASE, \IP2Location\Database::FILE_IO);

        try {
            $records = $obj->lookup($ip, \IP2Location\Database::ALL);
        } catch (Exception $e) {
            return null;
        }

        return $records;
    }

    public function getWebService($ip)
    {
        $ws = new \IP2Location\WebService(IP2LOCATION_API_KEY, IP2LOCATION_PACKAGE, IP2LOCATION_USESSL);

        try {
            $records = $ws->lookup($ip, IP2LOCATION_ADDONS, IP2LOCATION_LANGUAGE);
        } catch (Exception $e) {
            return null;
        }

        return $records;
    }

}
