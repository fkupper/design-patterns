<?php


use PHPUnit\Framework\TestCase;
use Observer\Weather\WeatherData;
use Observer\Weather\Display\CurrentConditionsDisplay;
use Observer\Weather\Interfaces\DisplayElement;
use Observer\Weather\Interfaces\Observer;
use Observer\Weather\Interfaces\Subject;
use Common\Utils;

class WeatherStationTest extends TestCase
{
	
	public function testCanCreateWeatherData()
	{
		$weatherData = new WeatherData();
		//assert instance for class and interface
		$this->assertInstanceOf(WeatherData::class, $weatherData);
		$this->assertInstanceOf(Subject::class, $weatherData);
	}
	
	/**
	 * @depends testCanCreateWeatherData
	 */
	public function testWeatherDataHasObserversButHasObserversArray(){
		$weatherData = new WeatherData();
		$this->assertInternalType('array', $weatherData->getObservers());
		$this->assertCount(0,$weatherData->getObservers());
	}
	
	/**
	 * @depends testWeatherDataHasObserversButHasObserversArray
	 */
	public function testCanCreateCurrentConditionsDisplayAndRegister(){
		$weatherData = new WeatherData();
		$display = new CurrentConditionsDisplay($weatherData);
		//assert instance for class and interface
		$this->assertInstanceOf(CurrentConditionsDisplay::class, $display);
		$this->assertInstanceOf(DisplayElement::class, $display);
		$this->assertInstanceOf(Observer::class, $display);
		
		$this->assertCount(1,$weatherData->getObservers());
		
	}
	
	/**
	 * @depends testCanCreateCurrentConditionsDisplayAndRegister
	 */
	public function testCanCreateCurrentConditionsDisplayAndRegisterThenRemove(){
		$weatherData = new WeatherData();
		$display = new CurrentConditionsDisplay($weatherData);

		$weatherData->removeObserver($display);
		
		$this->assertCount(0,$weatherData->getObservers());
		
	}
	
	/**
	 * @depends testCanCreateCurrentConditionsDisplayAndRegister
	 */
	public function testCanCreateCurrentConditionsDisplayAndRegisterThenUpdate(){
		$weatherData = new WeatherData();
		$display = new CurrentConditionsDisplay($weatherData);
	
		$temperature = 41.3;
		$humidity = 56.1;
		$pressure = 91.7;
		
		$weatherData->setMeasurements($temperature, $humidity, $pressure);
		$this->expectOutputString(Utils::echoln("Current conditions: $temperature C degrees and $humidity % humidity "));
		
	}
		
	
}