<?php
abstract class Handler {
	protected $hungerFactory;
	protected $successor;
	protected $monthNow;
	protected $dayNow;
	protected $handleNow;
	abstract public function handleRequest($request);
	abstract public function setSuccessor($nextService);
}