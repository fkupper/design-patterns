<?php

namespace Strategy\Duck\Behavior\Fly;

use Common\Utils;
use Strategy\Duck\Behavior\BaseInterfaces\FlyInterfaceBehavior;

/**
 * For ducks that can fly using wings.
 * 
 * @author kupper
 *        
 */
class FlyWithWingsBehavior implements FlyInterfaceBehavior {
	public function fly() {
		Utils::echoln ( "I am flying using wings!" );
	}
}