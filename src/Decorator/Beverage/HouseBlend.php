<?php

namespace Decorator\Beverage;
use Decorator\Beverage\Base\Beverage;

class HouseBlend extends Beverage{
	
	public function __construct(){
		$this->description = "House Blend Coffe";		
	}
	
	public function cost():float{
		return .89;
	}
}