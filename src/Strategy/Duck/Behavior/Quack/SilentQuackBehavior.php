<?php

namespace Strategy\Duck\Behavior\Quack;

use Common\Utils;
use Strategy\Duck\Behavior\Interfaces\QuackInterfaceBehavior;

/**
 * For ducks that cannot quack.
 * @author kupper
 *
 */
class SilentQuackBehavior implements QuackInterfaceBehavior
{
    public function quack()
    {
        Utils::echoln("<< Silence >>");
    }
}