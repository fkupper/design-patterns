<?php

namespace Common;

class Utils {
	/**
	 * Custom echo function just to prefent using PHP_EOL on every echo
	 *
	 * @param
	 *        	$message
	 */
	public static function echoln($message) {
		echo $message . "\n";
	}
}
