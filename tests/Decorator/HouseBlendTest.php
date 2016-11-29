<?php

use Decorator\Beverage\Base\Beverage;
use Decorator\Beverage\HouseBlend;
use Decorator\Condiments\Base\CondimentDecorator;
use Decorator\Condiments\Mocha;
use Decorator\Condiments\Soy;
use Decorator\Condiments\SteamedMilk;
use Decorator\Condiments\Whip;
use PHPUnit\Framework\TestCase;


class HouseBlendTest extends TestCase
{

	
	public function testCanCreateHouseBlend()
	{
		$b = new HouseBlend();
		//class is of both types
		$this->assertInstanceOf(HouseBlend::class, $b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertEquals("House Blend Coffe", $b->getDescription());
		$this->assertEquals(.89, $b->cost());
		
	}
	
	/**
	 * @depends testCanCreateHouseBlend
	 */
	public function testCanDecorateHouseBlendWithSingleCondiment(){
		
		$b = new HouseBlend();
		$b = new Mocha($b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertEquals("House Blend Coffe, Mocha", $b->getDescription());
		$this->assertEquals(1.09, $b->cost());
		
	}
	
	/**
	 * @depends testCanDecorateHouseBlendWithSingleCondiment
	 */
	public function testCanDecorateHouseBlendWithManyCondiments(){
	
		$b = new HouseBlend();
		$b = new Mocha($b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertEquals("House Blend Coffe, Mocha", $b->getDescription());
		$this->assertEquals(1.09, $b->cost());
		$b = new Soy($b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertEquals("House Blend Coffe, Mocha, Soy", $b->getDescription());
		$this->assertEquals(1.24, $b->cost());
		$b = new SteamedMilk($b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertEquals("House Blend Coffe, Mocha, Soy, Steamed Milk", $b->getDescription());
		$this->assertEquals(1.34, $b->cost());
		$b = new Whip($b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertEquals("House Blend Coffe, Mocha, Soy, Steamed Milk, Whip", $b->getDescription());
		$this->assertEquals(1.44, $b->cost());
	
	
	}
	
	
	/**
	 * @depends testCanDecorateHouseBlendWithManyCondiments
	 */
	public function testCanDecorateHouseBlendWithRepeatedCondiments(){
	
		$b = new HouseBlend();
		$b = new Mocha($b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertInstanceOf(CondimentDecorator::class, $b);
		$this->assertEquals("House Blend Coffe, Mocha", $b->getDescription());
		$this->assertEquals(1.09, $b->cost());
		$b = new Soy($b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertEquals("House Blend Coffe, Mocha, Soy", $b->getDescription());
		$this->assertEquals(1.24, $b->cost());
		$b = new SteamedMilk($b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertEquals("House Blend Coffe, Mocha, Soy, Steamed Milk", $b->getDescription());
		$this->assertEquals(1.34, $b->cost());
		$b = new SteamedMilk($b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertEquals("House Blend Coffe, Mocha, Soy, Steamed Milk, Steamed Milk", $b->getDescription());
		$this->assertEquals(1.44, $b->cost());
		$b = new Whip($b);
		$this->assertInstanceOf(Beverage::class, $b);
		$this->assertEquals("House Blend Coffe, Mocha, Soy, Steamed Milk, Steamed Milk, Whip", $b->getDescription());
		$this->assertEquals(1.54, $b->cost());
	
	
	}
	
	
	
	
}
