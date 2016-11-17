<?php
namespace Strategy;


use Common\Utils;
use Strategy\Duck\AbstractDuck;
use Strategy\Duck\MallardDuck;
use Strategy\Duck\ModelDuck;
use Strategy\Duck\Behavior\Fly\FlyRocketPoweredBehavior;

class DuckSim{
	
	/**
	 * 
	 * @var AbstractDuck[]
	 */
	private $ducks = [];
	
	public function startDucks(){
		Utils::echoln("=== DuckSim - Ducks simulator");
		
		Utils::echoln("== Creating a Mallard Duck");
		array_push($this->ducks, new MallardDuck());
		Utils::echoln("== Creating a Decoy Duck");
		array_push($this->ducks, new ModelDuck());
	}
	
	public function testDucks(){
		
		Utils::echoln("== Testing ducks...");
		foreach ($this->ducks as $duck) {
			$duck->display();
			$duck->swim();
			$duck->performFly();
			$duck->performQuack();
			Utils::echoln("..........");
		}
	
	}
	
	public function refactor(){
		
		Utils::echoln("== Model ducks must fly.");
		Utils::echoln("== Applying rockets on model ducks ...");
		
		foreach ($this->ducks as $duck) {
			if($duck instanceof ModelDuck){
				$duck->setFlyBehavior(new FlyRocketPoweredBehavior());
			}
		}
		
		Utils::echoln("== Done.");
		
	}
	
	public function run(){
		
		Utils::echoln("== Ducks are ready, running sim:");
		foreach ($this->ducks as $duck) {
			$duck->display();
			$duck->swim();
			$duck->performFly();
			$duck->performQuack();
			Utils::echoln("..........");
		} 		
		
	}
		
}