<?php

use Propel\User;
use Propel\UserQuery;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

class Search
{
	private $result = [];

	public function __construct()
	{
		$searchMethod = $_GET["searchMethod"];
		$searchText = $_GET["searchText"];

		if ($searchMethod == "freeText") {
			$q = UserQuery::create()->findByUserFirstname($searchText);

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
