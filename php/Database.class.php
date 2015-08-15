<?php
/**
 * Mysql Class: connect, translate db result to array
 *
 *	Usage:
 * 		mySql = new MySql();
 *		$db = $mySql->dbConnect();
 *		$query = "select * from table where username='".$username."'";
 *		$result = $db->query($query);
 */
class MySql {

	function __construct() {
	}
	public function dbConnect() {
		$result = new mysqli(SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS, SAE_MYSQL_DB);
		if (!$result) {
			return false;
		}
		$result->autocommit(TRUE);
		return $result;
	}
	public function resultToArray($result) {
		$resArray = array();

		for ($count = 0; $row = $result->fetch_assoc(); $count++) {
			$resArray[$count] = $row;
		}
		return $resArray;
	}
}

?>