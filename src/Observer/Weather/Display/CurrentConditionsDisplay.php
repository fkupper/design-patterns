<?php

namespace Observer\Weather\Display;

use Observer\Weather\Interfaces\{Observer,DisplayElement,Subject};
use Common\Utils;

class CurrentConditionsDisplay implements Observer, DisplayElement{
	
	/**
	 * 
	 * @var float
	 */
	private $temperature;
	/**
	 * 
	 * @var float
	 */
	private $humidity;
	
	/**
	 * 
	 * @var Subject	 
	 */
	private $weatherData;
	
	/**
	 * 
	 * @return Subject
	 */
	protected function getWeatherData():Subject{
		return $this->weatherData;
	} 
	
	/**
	 * 
	 * @param Subject $weatherData
	 * @return void
	 */
	protected function setWeatherData(Subject $weatherData){
		$this->weatherData = $weatherData;
	}
	
	public function __construct(Subject $weatherData){
		$this->setWeatherData($weatherData);
		$this->getWeatherData()->registerObserver($this);
	}
	
	public function update(float $temperature, float $humidity, float $pressure){
		$this->temperature = $temperature;
		$this->humidity = $humidity;
		
		$this->display();
	}
	
	public function display(){
		Utils::echoln("Current conditions: $this->temperature C degrees and $this->humidity % humidity ");		
	}
	
	
}