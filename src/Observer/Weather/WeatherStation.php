<?php

namespace Observer\Weather;

use Observer\Weather\Display\CurrentConditionsDisplay;
use Observer\Weather\Display\StatisticsDisplay;
use Observer\Weather\Display\ForecastDisplay;
use Observer\Weather\Display\HeatIndexDisplay;
use Common\Utils;

/**
 * WeatherStation
 * @author fkupper <fernando@kupper.com.br>
 *
 */

class WeatherStation {

	public static function main(){
		
		$weatherData = new WeatherData();
		
		$currentDisplay = new CurrentConditionsDisplay($weatherData);
		$statisticsDisplay = new StatisticsDisplay($weatherData);
		$forecastDisplay = new ForecastDisplay($weatherData);
		$heatDisplay = new HeatIndexDisplay($weatherData);
		
		Utils::echoln(" === Temperature update!");
		$weatherData->setMeasurements(65, 30, 30.4);
		Utils::echoln(" === Temperature update!");
		$weatherData->setMeasurements(82, 70, 29.2);
		Utils::echoln(" === Temperature update!");
		$weatherData->setMeasurements(78, 90, 29.2);
		
	}	
	
}
