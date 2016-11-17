<?php

namespace Strategy\Duck;


use Strategy\Duck\Behavior\Fly\FlyNoWayBehavior;
use Strategy\Duck\Behavior\Quack\SilentQuackBehavior;
use Common\Utils;
/**
 * The Model duck extends AbstractDuck and implements its own display.
 * @see QuackBehavior
 * @see FlyNoWayBehavior
 * @author kupper
 *
 */
class ModelDuck extends AbstractDuck
{
    public function __construct()
    {
		// model duck cannot fly       
        $this->setFlyBehavior(new FlyNoWayBehavior());
        // and cannot quack 
        $this->setQuackBehavior(new SilentQuackBehavior());
    }

    public function display()
    {
        Utils::echoln("I am a model Duck");
    }
}