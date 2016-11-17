<?php
use Common\Utils;
use Strategy\Main;

require __DIR__ . '/../vendor/autoload.php';

global $argv;

foreach ($argv as $arg) {
	if($arg == '-p=strategy'){
		Utils::echoln("===== Starting Strategy Pattern POC =====");
		Main::startSim();
	}
}

