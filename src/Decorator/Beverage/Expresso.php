<?php

namespace Decorator\Beverage;
use Decorator\Beverage\Base\Beverage;

class Expresso extends Beverage{
	
	public function __construct(){
		$this->description = "Expresso";		
	}
	
	public function cost():float{
		return 1.99;
	}
}