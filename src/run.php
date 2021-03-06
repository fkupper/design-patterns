<?php
use Common\Utils;
use Strategy\RunDuckSimulator;
use Observer\Weather\WeatherStation;
use Decorator\Shop\StarbuzzCoffee;

require __DIR__ . '/../vendor/autoload.php';

global $argv;

foreach ($argv as $arg) {
	
	switch ($arg){
		
		case '-p=strategy':
			Utils::echoln("===== Starting Strategy Pattern POC =====");
			RunDuckSimulator::startSim();
			break;
		case '-p=observer':
			Utils::echoln("===== Starting Observer Pattern POC =====");
			WeatherStation::main();		

		case '-p=decorator':
			Utils::echoln("===== Starting Decorator Pattern POC =====");
			StarbuzzCoffee::main();
	}
	
}

