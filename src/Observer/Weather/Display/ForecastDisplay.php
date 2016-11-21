<?php

namespace Observer\Weather\Display;

use Observer\Weather\Interfaces\{Observer,DisplayElement,Subject};
use Common\Utils;

class ForecastDisplay implements Observer, DisplayElement{
	
	/**
	 * 
	 * @var float
	 */
	private $currentPressure;
	/**
	 * 
	 * @var float
	 */
	private $lastPressure;
	
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
		$this->currentPressure = 29.92;  		
		$this->setWeatherData($weatherData);
		$this->getWeatherData()->registerObserver($this);
	}
	
	public function update(float $temperature, float $humidity, float $pressure){
		$this->lastPressure = $this->currentPressure;
		$this->currentPressure = $pressure;
		$this->display();
	}
	
	public function display(){
		Utils::echoln("Forecast: ");
		if($this->currentPressure > $this->lastPressure){
			Utils::echoln("Improving weather on the way!");
		}else if($this->currentPressure == $this->lastPressure){
			Utils::echoln("More of the same");
		}else{
			Utils::echoln("Watch out for cooler, rainy weather");
		}
	}
	
	
}