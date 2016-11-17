<?php

namespace Strategy\Duck\Behavior\Quack;

use Common\Utils;
use Strategy\Duck\Behavior\BaseInterfaces\QuackInterfaceBehavior;

/**
 * For ducks that cannot quack.
 * 
 * @author kupper
 *        
 */
class MuteQuackBehavior implements QuackInterfaceBehavior {
	public function quack() {
		Utils::echoln ( "<< Silence >>" );
	}
}