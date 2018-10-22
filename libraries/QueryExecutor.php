<?php
namespace libraries;


use \PDO;


/**
 * @TODOs
 * 1). Query Sanitisation to escape from SQL Injections.
 */
class QueryExecutor
{
	/** @var PDO */
	static $dbConnection;

	public function __construct()
	{
		if (empty(self::$dbConnection)) {
			self::$dbConnection = self::getConnection();
		}
	}

	public function executeUpdateQuery($query)
	{
		return self::$dbConnection->exec($query);
	}

	/**
	 * @param string $table
	 * @param array  $data
	 *
	 * @return mixed
	 */
	public function executeInsertQuery($table, array $data)
	{
		$fields = array_keys($data);
		$values = array_values($data);

		$fieldlist   = implode(',', $fields);
		$queryString = str_repeat("?,", count($fields) - 1);

		$sql = "INSERT INTO `" . $table . "` (" . $fieldlist . ") VALUES (${queryString}?)";

		$statement = self::$dbConnection->prepare($sql);

		$statement->execute($values);

		return self::$dbConnection->lastInsertId();
	}

	public function executeSelectOne()
	{
	}

	public function executeSelectAll()
	{
	}

	static private function getConnection()
	{
		$host    = '127.0.0.1';
		$db      = 'payment_process';
		$user    = 'root';
		$pass    = 'root';
		$charset = 'utf8mb4';

		$dsn     = "mysql:host=$host;dbname=$db;charset=$charset";
		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		try {
			$pdo = new PDO($dsn, $user, $pass, $options);
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int) $e->getCode());
		}

		return $pdo;
	}
}