<?php

namespace Observer\Weather;

use Observer\Weather\Interfaces\{Observer,Subject};


/**
 * WeatherData
 * @author fkupper <fernando@kupper.com.br>
 *
 */

class WeatherData implements Subject{

	/**
	 * 
	 * @var Observer[]
	 */
	private $observers;
	
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
	 * @var float
	 */
	private $pressure;
	
	/**
	 * 
	 * @return Observer[]
	 */
	public function getObservers(){
		return $this->observers;
	}
	
	public function __construct(){
		$this->observers = [];
	}
	
	/**
	 * Register a new observer to the list
	 * @param Observer $o
	 * @return void
	 */
	public function registerObserver(Observer $o){
		array_push($this->observers, $o);
	} 
	
	/**
	 * Removes an observer from the list
	 * @param Observer $o
	 * @return void
	 */
	public function removeObserver(Observer $o) {
		for ($i = 0; $i < count($this->observers); $i++) {
			if($this->observers[$i] == $o){
				array_splice($this->observers, $i, 1);
			}
		}
	}
	
	/**
	 * Notify each observer
	 * @return void
	 */
	function notifyObservers() {
		foreach ($this->observers as $o) {
			$o->update($this->temperature, $this->humidity, $this->pressure);
		}
	}
	
	/**
	 * We notify the observers when we get new measuments from the weather system 
	 * @return void
	 */
	public function measurementsChanged(){
		$this->notifyObservers();
	}

	/**
	 * Simulater the measurement system 
	 * 
	 * @param float $temperature
	 * @param float $humidity
	 * @param float $pressure
	 * @return void
	 */
	public function setMeasurements(float $temperature, float $humidity, float $pressure){
		$this->temperature = $temperature;
		$this->humidity = $humidity;
		$this->pressure = $pressure;
		$this->measurementsChanged();
	}
	
}
