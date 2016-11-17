<?php


use PHPUnit\Framework\TestCase;
use Strategy\DuckSim;
use Strategy\Duck\MallardDuck;
use Strategy\Duck\ModelDuck;
use Strategy\Duck\Behavior\Fly\FlyRocketPoweredBehavior;
use Strategy\Duck\Behavior\Fly\FlyNoWayBehavior;
use Strategy\Duck\Behavior\Quack\QuackBehavior;
use Strategy\Duck\Behavior\BaseInterfaces\QuackInterfaceBehavior;
use Strategy\Duck\Behavior\Quack\MuteQuackBehavior;
use Strategy\Duck\Behavior\BaseInterfaces\FlyInterfaceBehavior;
use Strategy\Duck\Behavior\Fly\FlyWithWingsBehavior;

class DuckSimTest extends TestCase
{

	
	public function testCanCreateDuckSim()
	{
		$duckSim = new DuckSim();
		$this->assertInstanceOf(DuckSim::class, $duckSim);
	}
	
	/**
	 * @depends testCanCreateDuckSim
	 */
	public function testDuckSimHasNoDucksButHasDucksArray(){
		$duckSim = new DuckSim();
		$this->assertInternalType('array', $duckSim->getDucks());
		$this->assertCount(0,$duckSim->getDucks());
	}
	
	public function testCanToggleOutput(){
		$duckSim = new DuckSim();
		$this->assertTrue($duckSim->hasOuput());
		$duckSim->toggleOutput();
		$this->assertFalse($duckSim->hasOuput());
	}
	
	/**
	 * @depends testCanToggleOutput
	 */
	public function testSimCanStart(){
		$duckSim = new DuckSim();
		$duckSim->toggleOutput();
		$duckSim->startDucks();
		//must create 2 ducks
		$this->assertCount(2,$duckSim->getDucks());
		
		$ducks = $duckSim->getDucks();
		$this->assertInstanceOf(MallardDuck::class, $ducks[0]);
		$this->assertInstanceOf(ModelDuck::class, $ducks[1]);
	}
	
	/**
	 * @depends testSimCanStart
	 */
	public function testSimCanRefactor(){
		$duckSim = new DuckSim();
		$duckSim->toggleOutput();
		$duckSim->startDucks();
		//must create 2 ducks
		$this->assertCount(2,$duckSim->getDucks());
		$ducks = $duckSim->getDucks();
		
		foreach ( $ducks as $duck ) {
			if ($duck instanceof ModelDuck) {
				$this->assertInstanceOf(FlyNoWayBehavior::class, $duck->getFlyBehavior());
			}
		}
		
		$duckSim->refactor();
		
		//checks if ducks really can have their behavior changed at runtime
		foreach ( $ducks as $duck ) {
			if ($duck instanceof ModelDuck) {
				$this->assertInstanceOf(FlyRocketPoweredBehavior::class, $duck->getFlyBehavior());
			}
		}
	}
	
	public function testCanChangeQuackBehaviorDuringRuntime(){
		
		$duck = new MallardDuck();
		
		//MallardDuck default quack behavior is both instace of the class and the interface 
		$this->assertInstanceOf(QuackInterfaceBehavior::class, $duck->getQuackBehavior());
		$this->assertInstanceOf(QuackBehavior::class, $duck->getQuackBehavior());
		
		$newQuack = new MuteQuackBehavior();
		//new quack must be instance of the interface
		$this->assertInstanceOf(QuackInterfaceBehavior::class, $newQuack);
		
		$duck->setQuackBehavior($newQuack);
		
		//new quack must be instance of the class
		$this->assertInstanceOf(MuteQuackBehavior::class, $duck->getQuackBehavior());
		
	}
	
	public function testCanChangeFlyBehaviorDuringRuntime(){
	
		$duck = new MallardDuck();
	
		//MallardDuck default fly behavior is both instace of the class and the interface
		$this->assertInstanceOf(FlyInterfaceBehavior::class, $duck->getFlyBehavior());
		$this->assertInstanceOf(FlyWithWingsBehavior::class, $duck->getFlyBehavior());
	
		$newFly = new FlyRocketPoweredBehavior();
		//new fly must be instance of the interface
		$this->assertInstanceOf(FlyInterfaceBehavior::class, $newFly);
	
		$duck->setFlyBehavior($newFly);
	
		//new fly must be instance of the class
		$this->assertInstanceOf(FlyRocketPoweredBehavior::class, $duck->getFlyBehavior());
	
	}
		
		
	
	
	
	
	
}