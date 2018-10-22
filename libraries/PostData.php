<?php
namespace libraries;


class PostData
{
	/* @var array */
	protected $postData;

	public function __construct(array $postData)
	{
		$this->postData = $postData;
	}

	public function get($key)
	{
		$value = isset($this->postData[$key]) ? $this->postData[$key] : null;

		return trim($value);
	}
}