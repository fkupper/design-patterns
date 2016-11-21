<?php

namespace Strategy;

class RunDuckSimulator {
	public static function startSim() {
		$duckSim = new DuckSim ();
		$duckSim->startDucks ();
		$duckSim->testDucks ();
		$duckSim->refactor ();
		$duckSim->run ();
	}
}

