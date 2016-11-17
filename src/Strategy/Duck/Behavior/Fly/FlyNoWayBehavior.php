<?php

namespace Strategy\Duck\Behavior\Fly;

use Common\Utils;
use Strategy\Duck\Behavior\BaseInterfaces\FlyInterfaceBehavior;


/**
 * For ducks that cannot fly at all.
 * @author kupper
 *
 */
class FlyNoWayBehavior implements FlyInterfaceBehavior
{
    public function fly()
    {
        Utils::echoln("I cannot fly");
    }
}