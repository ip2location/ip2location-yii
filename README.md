# IP2Location Yii extension
IP2Location Yii extension enables the user to find the country, region, city, coordinates, zip code, time zone, ISP, domain name, connection type, area code, weather, MCC, MNC, mobile brand name, elevation, usage type, IP address type and IAB advertising category from IP address using IP2Location database. It has been optimized for speed and memory utilization. Developers can use the API to query all IP2Location BIN databases or web service for applications written using Yii

## INSTALLATION
For Yii2

1. Run the command: `composer require ip2location/ip2location-yii` to download the extension into the Yii2 framework.
2. Download latest IP2Location BIN database
    - IP2Location free LITE database at https://lite.ip2location.com
    - IP2Location commercial database at https://www.ip2location.com
3. Unzip and copy the BIN file into the Yii2 framework.

**Note:** The BIN database refers to the binary file ended with .BIN extension, but not the CSV format.
Please select the right package for download.


## USAGE
```
use IP2LocationYii\IP2Location_Yii;

// (required) Define IP2Location database path.
define('IP2LOCATION_DATABASE', '/path/to/ip2location/database');

// (required) Define IP2Location.io API key.
define('IP2LOCATION_IO_API_KEY', 'your_api_key');

// (optional) Define Translation information. Refer to https://www.ip2location.io/ip2location-documentation for available languages.
define('IP2LOCATION_IO_LANGUAGE', 'en');

// (optional) Define Translation information. Refer to https://www.ip2location.com/web-service/ip2location for available languages.
define('IP2LOCATION_LANGUAGE', 'en');

$IP2Location = new IP2Location_Yii();

$record = $IP2Location->get('8.8.8.8');
echo 'Result from BIN Database:<br>';
echo 'IP Address: ' . $record['ipAddress'] . '<br>';
echo 'IP Number: ' . $record['ipNumber'] . '<br>';
echo 'ISO Country Code: ' . $record['countryCode'] . '<br>';
echo 'Country Name: ' . $record['countryName'] . '<br>';
echo 'Region Name: ' . $record['regionName'] . '<br>';
echo 'City Name: ' . $record['cityName'] . '<br>';
echo 'Latitude: ' . $record['latitude'] . '<br>';
echo 'Longitude: ' . $record['longitude'] . '<br>';
echo 'ZIP Code: ' . $record['zipCode'] . '<br>';
echo 'Time Zone: ' . $record['timeZone'] . '<br>';
echo 'ISP Name: ' . $record['isp'] . '<br>';
echo 'Domain Name: ' . $record['domainName'] . '<br>';
echo 'Net Speed: ' . $record['netSpeed'] . '<br>';
echo 'IDD Code: ' . $record['iddCode'] . '<br>';
echo 'Area Code: ' . $record['areaCode'] . '<br>';
echo 'Weather Station Code: ' . $record['weatherStationCode'] . '<br>';
echo 'Weather Station Name: ' . $record['weatherStationName'] . '<br>';
echo 'MCC: ' . $record['mcc'] . '<br>';
echo 'MNC: ' . $record['mnc'] . '<br>';
echo 'Mobile Carrier Name: ' . $record['mobileCarrierName'] . '<br>';
echo 'Elevation: ' . $record['elevation'] . '<br>';
echo 'Usage Type: ' . $record['usageType'] . '<br>';
echo 'Address Type: ' . $record['addressType'] . '<br>';
echo 'Category: ' . $record['category'] . '<br>';

$record = $IP2Location->getWebService('8.8.8.8');
echo 'Result from Web service:<br>';
echo '<pre>';
print_r ($record);
echo '</pre>';
```


## DEPENDENCIES
This library requires IP2Location BIN data file or IP2Location API key to function. You may download the BIN data file at
* IP2Location LITE BIN Data (Free): https://lite.ip2location.com
* IP2Location Commercial BIN Data (Comprehensive): https://www.ip2location.com

You can also sign up for [IP2Location.io IP Geolocation API](https://www.ip2location.io/sign-up) to get one free API key.


## SUPPORT
Email: support@ip2location.com

Website: https://www.ip2location.com
