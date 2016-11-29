<?php

namespace Decorator\Beverage;
use Decorator\Beverage\Base\Beverage;

class Decaf extends Beverage{
	
	public function __construct(){
		$this->description = "Decaf";		
	}
	
	public function cost():float{
		return 1.05;
	}
	
}