<?php

namespace Observer\Weather\Interfaces;

/**
 *  
 * @author fkupper <fernando@kupper.com.br>
 * The subject interface 
 * 
 */
interface Subject{
	public function registerObserver(Observer $o);
	public function removeObserver(Observer $o);
	public function notifyObservers();
}