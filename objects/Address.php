<?php
namespace objects;


class Address
{
	private $line1;
	private $line2;
	private $city;
	private $state;
	private $zip;

	public function __construct($addressLine1, $addressLine2, $city, $state, $zip)
	{
		$this->line1 = $addressLine1;
		$this->line2 = $addressLine2;
		$this->city  = $city;
		$this->state = $state;
		$this->zip   = $zip;
	}

	public function getLine1()
	{
		return $this->line1;
	}

	public function getLine2()
	{
		return $this->line2;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function getState()
	{
		return $this->state;
	}

	public function getZip()
	{
		return $this->zip;
	}
}