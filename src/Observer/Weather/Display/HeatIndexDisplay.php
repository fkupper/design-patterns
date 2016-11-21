<?php

namespace Observer\Weather\Display;

use Observer\Weather\Interfaces\{Observer,DisplayElement,Subject};
use Common\Utils;

class HeatIndexDisplay implements Observer, DisplayElement{
	
	/**
	 * 
	 * @var float
	 */
	private $heatIndex;
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
		$this->heatIndex = 0;
		$this->setWeatherData($weatherData);
		$this->getWeatherData()->registerObserver($this);
	}
	
	private function computeHeatIndex(float $t, float $rh):float {
		$index = ((16.923 + (0.185212 * $t) + (5.37941 * $rh) - (0.100254 * $t * $rh)
				+ (0.00941695 * ($t * $t)) + (0.00728898 * ($rh * $rh))
				+ (0.000345372 * ($t * $t * $rh)) - (0.000814971 * ($t * $rh * $rh)) +
				(0.0000102102 * ($t * $t * $rh * $rh)) - (0.000038646 * ($t * $t * $t)) + (0.0000291583 *
						($rh * $rh * $rh)) + (0.00000142721 * ($t * $t * $t * $rh)) +
				(0.000000197483 * ($t * $rh * $rh * $rh)) - (0.0000000218429 * ($t * $t * $t * $rh * $rh)) +
				0.000000000843296 * ($t * $t * $rh * $rh * $rh)) -
				(0.0000000000481975 * ($t * $t * $t * $rh * $rh * $rh)));
		return $index;
	}
	
	public function update(float $temperature, float $humidity, float $pressure){
		$this->heatIndex = $this->computeHeatIndex($temperature, $humidity);
		$this->display();
	}
	
	public function display(){
		Utils::echoln("Heat index is " . $this->heatIndex);
	}
	
	
}