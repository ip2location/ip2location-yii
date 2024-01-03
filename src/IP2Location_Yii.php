<?php
namespace IP2LocationYii;

use Yii;

// Web Service Settings
if(defined('IP2LOCATION_IO_API_KEY')) {
	define('USE_IO', true);
} else  {
	define('USE_IO', false);
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
		if (USE_IO) {
			// Using IP2Location.io API
			$ioapi_baseurl = 'https://api.ip2location.io/?';
			$params = [
				'key'     => IP2LOCATION_IO_API_KEY,
				'ip'      => $ip,
				'lang'    => ((defined('IP2LOCATION_IO_LANGUAGE')) ? IP2LOCATION_IO_LANGUAGE : ''),
				'source'  => 'yii-ipl',
			];
			// Remove parameters without values
			$params = array_filter($params);
			$url = $ioapi_baseurl . http_build_query($params);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FAILONERROR, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);

			$response = curl_exec($ch);

			if (!curl_errno($ch)) {
				if (($data = json_decode($response, true)) === null) {
					return false;
				}
				if (array_key_exists('error', $data)) {
					throw new \Exception(__CLASS__ . ': ' . $data['error']['error_message'], $data['error']['error_code']);
				}
				return $data;
			}

			curl_close($ch);

			return false;
		} else {
			$ws = new \IP2Location\WebService(IP2LOCATION_API_KEY, IP2LOCATION_PACKAGE, IP2LOCATION_USESSL);

			try {
				$records = $ws->lookup($ip, IP2LOCATION_ADDONS, IP2LOCATION_LANGUAGE);
			} catch (Exception $e) {
				return null;
			}
        }

        return $records;
    }

}
