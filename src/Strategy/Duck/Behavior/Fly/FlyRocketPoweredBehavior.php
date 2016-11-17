<?php

namespace Strategy\Duck\Behavior\Fly;

use Common\Utils;
use Strategy\Duck\Behavior\BaseInterfaces\FlyInterfaceBehavior;


/**
 * For ducks that can fly using rockets.
 * @author kupper
 *
 */
class FlyRocketPoweredBehavior implements FlyInterfaceBehavior
{
    public function fly()
    {
        Utils::echoln("I can fly on a rocket!");
    }
}