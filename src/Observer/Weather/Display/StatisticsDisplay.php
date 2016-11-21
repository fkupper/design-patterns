<?php

namespace Observer\Weather\Display;

use Observer\Weather\Interfaces\{Observer,DisplayElement,Subject};
use Common\Utils;

class StatisticsDisplay implements Observer, DisplayElement{
	
	/**
	 * 
	 * @var float
	 */
	private $maxTemp;
	/**
	 * 
	 * @var float
	 */
	private $minTemp;
	/**
	 *
	 * @var float
	 */
	private $tempSum;
	/**
	 * 
	 * @var integer
	 */
	private $numReadings;
	
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
		$this->maxTemp = 0;
		$this->minTemp = 100;
		$this->tempSum = 0;
		$this->numReadings = 0;
		$this->setWeatherData($weatherData);
		$this->getWeatherData()->registerObserver($this);
	}
	
	public function update(float $temperature, float $humidity, float $pressure){
		$this->tempSum += $temperature;
		$this->numReadings++;
		
		if ($temperature > $this->maxTemp) {
			$this->maxTemp = $temperature;
		}
		
		if ($temperature < $this->minTemp) {
			$this->minTemp = $temperature;
		}
		$this->display();
	}
	
	public function display(){
		Utils::echoln("Avg/Max/Min temperature = " . ($this->tempSum / $this->numReadings)
			. "/" . $this->maxTemp . "/" . $this->minTemp);
	}
	
	
}