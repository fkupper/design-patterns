<?php

namespace Strategy\Duck;

use Common\Utils;
use Strategy\Duck\Behavior\Quack\QuackBehavior;
use Strategy\Duck\Behavior\Fly\FlyWithWingsBehavior;

/**
 * The Mallard duck extends AbstractDuck and implements its own display.
 * 
 * @see QuackBehavior
 * @see FlyWithWingsBehavior
 * @author kupper
 *        
 */
class MallardDuck extends AbstractDuck {
	public function __construct() {
		// Mallard duck can quack normamlly
		$this->setQuackBehavior ( new QuackBehavior () );
		// Mallard Duck uses wings to fly
		$this->setFlyBehavior ( new FlyWithWingsBehavior () );
	}
	public function display() {
		Utils::echoln ( "I am a real Mallard duck" );
	}
}