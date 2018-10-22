<?php
namespace objects;


class CreditCard
{
	private $cardName;
	private $cardNo;
	private $cardCode;
	private $expiryMonth;
	private $expiryYear;

	/**
	 * @param string $cardName
	 * @param string $cardNo
	 * @param string $cardCode
	 * @param string $expiryMonth
	 * @param string $expiryYear
	 */
	public function __construct($cardName, $cardNo, $cardCode, $expiryMonth, $expiryYear)
	{
		$this->cardName    = $cardName;
		$this->cardNo      = $cardNo;
		$this->cardCode    = $cardCode;
		$this->expiryMonth = $expiryMonth;
		$this->expiryYear  = $expiryYear;
	}

	public function getCardName()
	{
		return $this->cardName;
	}

	public function getCardNo()
	{
		return $this->cardNo;
	}

	public function getCardCode()
	{
		return $this->cardCode;
	}

	public function getExpiryMonth()
	{
		return $this->expiryMonth;
	}

	public function getExpiryYear()
	{
		return $this->expiryYear;
	}
}