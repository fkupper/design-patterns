<?php

namespace Decorator\Beverage;
use Decorator\Beverage\Base\Beverage;

class DarkRoast extends Beverage{
	
	public function __construct(){
		$this->description = "Dark Roast Coffe";		
	}
	
	public function cost():float{
		return .99;
	}
}