<?php

namespace Strategy\Duck\Behavior\Quack;

use Common\Utils;
use Strategy\Duck\Behavior\BaseInterfaces\QuackInterfaceBehavior;

/**
 * For quacking ducks.
 * 
 * @author kupper
 *        
 */
class QuackBehavior implements QuackInterfaceBehavior {
	public function quack() {
		Utils::echoln ( "Quack!" );
	}
}