<?php

use Propel\Users;
use Propel\UsersQuery;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

class Search
{
	private $result = [];

	public function __construct()
	{
		$searchMethod = $_POST["searchMethod"];
		$searchText = $_POST["searchText"];

		if ($searchMethod == "freeText") {
			$q = UsersQuery::create()->findByUserFirstname($searchText);

			foreach ($q as $value) {
				$this->result[] = $value->getUserFirstname();
			}
		}
	}

	public function getResult() {
		return $this->result;
	}

	public function display()
	{
		echo "<table>";
		foreach ($this->result as $value) {
			echo <<<EOD
  <tr><td>{$value}</td></tr>
EOD;
		}
		echo "</table>";
	}
}
