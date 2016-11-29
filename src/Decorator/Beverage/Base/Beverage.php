<?php
namespace Decorator\Beverage\Base;


/**
 * Abstract class represeting basic beverages.
 * Child classes have to implement cost()
 * @author fkupper <fernando@kupper.com.br>
 *
 */
abstract class Beverage{
	
	protected $description = "Unknow beverage";
	
	/**
	 * Get the beverage description
	 * @return string
	 */
	public function getDescription():string{
		return $this->description;
	}
	
	/**
	 * Get the beverage cost
	 * @return float
	 */
	public abstract function cost():float;
	
}