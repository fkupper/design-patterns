<?php

namespace Strategy\Duck\Behavior\Quack;

use Common\Utils;
use Strategy\Duck\Behavior\Interfaces\QuackInterfaceBehavior;

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