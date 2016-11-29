<?php

namespace Decorator\Condiments;
use Decorator\Condiments\Base\CondimentDecorator;
use Decorator\Beverage\Base\Beverage;

class Soy extends CondimentDecorator{
	
	/**
	 * 
	 * @var Beverage
	 */
	protected $beverage;
	
	
	
	public function __construct(Beverage $beverage){
		$this->beverage = $beverage;	
	}
	
	public function getDescription():string{
		return $this->beverage->getDescription(). ", Soy";
	}
	
	public function cost():float{
		return $this->beverage->cost()+.15;
	}
	
}