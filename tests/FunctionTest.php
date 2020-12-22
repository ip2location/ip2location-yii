<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use IP2LocationYii\IP2Location_Yii;

class FunctionTest extends TestCase
{
	public function testGetDb() {
		define('IP2LOCATION_DATABASE', './database/IP2LOCATION.BIN');
		$IP2Location = new IP2Location_Yii();
		$record = $IP2Location->get('8.8.8.8');

		$this->assertEquals(
			'US',
			$record['countryCode'],
		);
	}

	public function testGetWebService() {
		$IP2Location = new IP2Location_Yii();
		$record = $IP2Location->getWebService('8.8.8.8');

		$this->assertEquals(
			'US',
			$record['country_code'],
		);
	}
}