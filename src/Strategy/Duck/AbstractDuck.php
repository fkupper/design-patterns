<?php

namespace Strategy\Duck;


use Strategy\Duck\Behavior\Interfaces\{QuackInterfaceBehavior, FlyInterfaceBehavior};
use Common\Utils;

/**
 * Parent class for all ducks.
 * @author kupper
 *
 */
abstract class AbstractDuck
{
    /**
     * @var QuackInterfaceBehavior
     */
    protected $quackBehavior;
    /**
     * @var FlyInterfaceBehavior
     */
    protected $flyBehavior;

    /**
     * Delegating quack to the behavior interface
     * Using get method instead of direct access to attribute just to enforce stric type 
     */
    public function performQuack()
    {
        $this->getQuackBehavior()->quack();
    }

    /**
     * Delegating fly to the behavior interface.
     * Using get method instead of direct access to attribute just to enforce stric type 
     */
    public function performFly()
    {
        $this->getFlyBehavior()->fly();
    }

    public function swim()
    {
        Utils::echoln("All ducks float, even decoys!");
    }

    /**
     * Get fly interface behavior
     * @return FlyInterfaceBehavior
     */
    public function getFlyBehavior():FlyInterfaceBehavior{
    	return $this->flyBehavior;
    }
    
    /**
     * Set fly interface behavior
     * @param FlyInterfaceBehavior $flyInterfaceBehavior
     */
    public function setFlyBehavior(FlyInterfaceBehavior $flyInterfaceBehavior)
    {
        $this->flyBehavior = $flyInterfaceBehavior;
    }

    /**
     * Get quack interface behavior
     * @return QuackInterfaceBehavior
     */
    public function getQuackBehavior():QuackInterfaceBehavior{
    	return $this->quackBehavior;
    }
    
    /**
     * Set quack interface behavior
     * @param QuackInterfaceBehavior $quackInterfaceBehavior
     */
    public function setQuackBehavior(QuackInterfaceBehavior $quackInterfaceBehavior)
    {
        $this->quackBehavior = $quackInterfaceBehavior;
    }
	    
    /**
     * Every duck should have it's own display 
     */
    public abstract function display();
}
