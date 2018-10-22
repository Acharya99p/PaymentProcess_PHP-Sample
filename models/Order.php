<?php
namespace models;


use libraries\QueryExecutor;

class Order
{
	const TABLE = 'orders';

	const ID          = 'id';
	const Amount      = 'amount';
	const Status      = 'status';
	const PaymentID   = 'payment_id';
	const SubmittedAt = 'submitted_at';
	const CreatedAt   = 'created_at';
	const UpdatedAt   = 'updated_at';

	protected $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function setSubmittedAt($time)
	{
		if (empty($time)) {
			throw new \Exception('Invalid time');
		}

		$query = 'UPDATE ' . self::TABLE . ' SET ' . self::SubmittedAt . ' = ' . $time . ', '.self::UpdatedAt.'= NOW(), '.self::Status."='in-progress'".'
			WHERE ' . self::ID . '=' . $this->id;

		try {
			(new QueryExecutor())->executeUpdateQuery($query);

			return true;
		} catch (\Exception $Exception) {
			return false;
		}
	}
}