<?php

namespace Strategy\Duck\Behavior\Quack;

use Common\Utils;
use Strategy\Duck\Behavior\BaseInterfaces\QuackInterfaceBehavior;

/**
 * For rubber ducks.
 * @author kupper
 *
 */
class SqueakQuackBehavior implements QuackInterfaceBehavior
{
    public function quack()
    {
        Utils::echoln("Squeak");
    }
}