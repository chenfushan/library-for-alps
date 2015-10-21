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
	private $HOST;
	private $PORT;
	private $USER;
	private $PASSWORD;
	private $DBNAME;

	function __construct() {
		$HOST='';
		$PORT='8080';
		$USER='';
		$PASSWORD='';
		$DBNAME='';
	}
	/**
	 * connect the mysql database;
	 * @return connection the mysql connection
	 */
	public function dbConnect() {
		$result = new mysqli($HOST . ':' . $PORT, $USER, $PASSWORD, $DBNAME);
		if (!$result) {
			return false;
		}
		$result->autocommit(TRUE);
		return $result;
	}
	/**
	 * translate the db result to array
	 * @param  db_res $result db query result
	 * @return array         the db result array
	 */
	public function resultToArray($result) {
		$resArray = array();

		for ($count = 0; $row = $result->fetch_assoc(); $count++) {
			$resArray[$count] = $row;
		}
		return $resArray;
	}

	/**
	 * Getter for HOST
	 * @return
	 */
	public function getHOST()
	{
	    return $this->HOST;
	}
	
	/**
	 * Setter for HOST
	 * @param HOST value to set
	 * @return self
	 */
	public function setHOST($HOST)
	{
	    $this->HOST = $HOST;
	    return $this;
	}
	/**
	 * Getter for PORT
	 * @return
	 */
	public function getPORT()
	{
	    return $this->PORT;
	}
	
	/**
	 * Setter for PORT
	 * @param PORT value to set
	 * @return self
	 */
	public function setPORT($PORT)
	{
	    $this->PORT = $PORT;
	    return $this;
	}
	/**
	 * Getter for USER
	 * @return
	 */
	public function getUSER()
	{
	    return $this->USER;
	}
	
	/**
	 * Setter for USER
	 * @param USER value to set
	 * @return self
	 */
	public function setUSER($USER)
	{
	    $this->USER = $USER;
	    return $this;
	}
	/**
	 * Getter for PASSWORD
	 * @return
	 */
	public function getPASSWORD()
	{
	    return $this->PASSWORD;
	}
	
	/**
	 * Setter for PASSWORD
	 * @param PASSWORD value to set
	 * @return self
	 */
	public function setPASSWORD($PASSWORD)
	{
	    $this->PASSWORD = $PASSWORD;
	    return $this;
	}
	/**
	 * Getter for DBNAME
	 * @return
	 */
	public function getDBNAME()
	{
	    return $this->DBNAME;
	}
	
	/**
	 * Setter for DBNAME
	 * @param DBNAME value to set
	 * @return self
	 */
	public function setDBNAME($DBNAME)
	{
	    $this->DBNAME = $DBNAME;
	    return $this;
	}
	
	/**
	 * Setter for database
	 * @param  value to set
	 * @return self
	 */
	public function setMysql($database)
	{
	    $this->HOST = $database['host'];
	    $this->USER = $database['user'];
	    $this->PASSWORD = $database['password'];
	    $this->DBNAME = $database['dbname'];
	    return $this;
	}
	
}

?>