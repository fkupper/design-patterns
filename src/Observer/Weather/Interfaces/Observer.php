<?php

namespace Observer\Weather\Interfaces;

/**
 * 
 * @author fkupper <fernando@kupper.com.br>
 *
 */
interface Observer{
	public function update(float $temperature, float $humidity, float $pressure);		
}