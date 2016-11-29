<?php
namespace Decorator\Shop;



use Common\Utils;
use Decorator\Beverage\Base\Beverage;
use Decorator\Beverage\Expresso;
use Decorator\Beverage\DarkRoast;
use Decorator\Beverage\HouseBlend;
use Decorator\Condiments\Mocha;
use Decorator\Condiments\Whip;
use Decorator\Condiments\Soy;


class StarbuzzCoffee {
	
	public static function main(){
		
		/**
		 * 
		 * @var Beverage $beverage
		 */
		$beverage = new Expresso();
		Utils::echoln($beverage->getDescription().' $'.$beverage->cost());
		
		$beverage2 = new DarkRoast();
		$beverage2 = new Mocha($beverage2);
		$beverage2 = new Mocha($beverage2);
		$beverage2 = new Whip($beverage2);
		Utils::echoln($beverage2->getDescription().' $'.$beverage2->cost());
		
		$beverage3 = new HouseBlend();
		$beverage3 = new Soy($beverage3);
		$beverage3 = new Mocha($beverage3);
		$beverage3 = new Whip($beverage3);
		Utils::echoln($beverage3->getDescription().' $'.$beverage3->cost());
		
		
	}
	
	
	
	
	
	
	
}