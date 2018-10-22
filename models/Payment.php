<?php
namespace models;


use libraries\QueryExecutor;
use objects\Address;
use objects\CreditCard;

class Payment
{
	const TABLE = 'payments';

	const ID                    = 'id';
	const Amount                = 'amount';
	const TimeCreated           = 'time_created';
	const Name                  = 'name';
	const CreditCardNumber      = 'credit_card_number';
	const CreditCardExpiryMonth = 'credit_card_expiry_month';
	const CreditCardExpiryYear  = 'credit_card_expiry_year';
	const Company               = 'company';
	const Line1                 = 'line1';
	const Line2                 = 'line2';
	const City                  = 'city';
	const State                 = 'state';
	const Zip                   = 'zip';
	const Status                = 'status';

	public function __construct($id)
	{
		$this->id = $id;
	}

	static public function createPayment($company, $orderID, $amount, CreditCard $CreditCard, Address $Address)
	{
		$data = [
			self::Amount                => $amount,
			self::Name                  => $CreditCard->getCardName(),
			self::CreditCardNumber      => $CreditCard->getCardNo(),// TODO: Should be stored encrypted with Encryption library.
			self::CreditCardExpiryMonth => $CreditCard->getExpiryMonth(), // TODO: Should be stored encrypted with Encryption library.
			self::CreditCardExpiryYear  => $CreditCard->getExpiryYear(), // TODO: Should be stored encrypted with Encryption library.
			self::Company               => $company,
			self::Line1                 => $Address->getLine1(),
			self::Line2                 => $Address->getLine2(),
			self::City                  => $Address->getCity(),
			self::State                 => $Address->getState(),
			self::Zip                   => $Address->getZip(),
		];

		$id = (new QueryExecutor())->executeInsertQuery(self::TABLE, $data);

		$query = 'UPDATE ' . Order::TABLE . ' SET ' . Order::PaymentID . ' = ' . $id . ', '.Order::UpdatedAt.'= NOW(), '.Order::Status."='paid'".'
			WHERE ' . Order::ID . '=' . $orderID;

		$id = (new QueryExecutor())->executeUpdateQuery($query);;

		return $id;
	}
}