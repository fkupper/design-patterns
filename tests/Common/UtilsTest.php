<?php


use PHPUnit\Framework\TestCase;
use Common\Utils;

class UtilsTest extends TestCase
{
	public function testExpectEcholnOutput()
	{
		$this->expectOutputString(Utils::echoln('test echoln'));
		print "test echoln\n";
	}
}
