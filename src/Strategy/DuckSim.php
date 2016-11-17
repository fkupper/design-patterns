<?php
namespace Strategy;

use Common\Utils;
use Strategy\Duck\AbstractDuck;
use Strategy\Duck\MallardDuck;
use Strategy\Duck\ModelDuck;
use Strategy\Duck\Behavior\Fly\FlyRocketPoweredBehavior;

class DuckSim {
	
	/**
	 *
	 * @var AbstractDuck[]
	 */
	private $ducks = [ ];
	
	/**
	 *
	 * @var boolean
	 */
	private $output = true;
	public function getDucks(): array {
		return $this->ducks;
	}
	
	public function hasOuput(){
		return $this->output;
	}
	
	public function toggleOutput() {
		$this->output = false;
	}
	
	public function startDucks() {
		if ($this->output) {
			Utils::echoln ( "=== DuckSim - Ducks simulator" );
			Utils::echoln ( "== Creating a Mallard Duck" );
		}
		
		array_push ( $this->ducks, new MallardDuck () );
		
		if ($this->output)
			Utils::echoln ( "== Creating a Decoy Duck" );
		
		array_push ( $this->ducks, new ModelDuck () );
		
	}
	public function testDucks() {
		if ($this->output)
			Utils::echoln ( "== Testing ducks..." );
		
		foreach ( $this->ducks as $duck ) {
			$duck->display ();
			$duck->swim ();
			$duck->performFly ();
			$duck->performQuack ();
			if ($this->output)
				Utils::echoln ( ".........." );
		}
	}
	public function refactor() {
		if ($this->output) {
			Utils::echoln ( "== Model ducks must fly." );
			Utils::echoln ( "== Applying rockets on model ducks ..." );
		}
		
		foreach ( $this->ducks as $duck ) {
			if ($duck instanceof ModelDuck) {
				$duck->setFlyBehavior ( new FlyRocketPoweredBehavior () );
			}
		}
		if ($this->output)
			Utils::echoln ( "== Done." );
	}
	public function run() {
		if ($this->output)
			Utils::echoln ( "== Ducks are ready, running sim:" );
		foreach ( $this->ducks as $duck ) {
			$duck->display ();
			$duck->swim ();
			$duck->performFly ();
			$duck->performQuack ();
			if ($this->output)
				Utils::echoln ( ".........." );
		}
	}
}