<?php 
	require_once 'Database.class.php';
	/**
	* This class is a Log class
	* It is depend on mysql database, so please require database.class.php first.
	* The Log table is:
	* ---------------
	* id bigint primary key auto_increment
	* log_time datetime not null
	* log_content varchar(255) not null
	* log_type int not null
	* ---------------
	*/
	class Log
	{
		/**
		 * Mysql Object
		 * @var Object
		 */
		private $mySql;
		
		/**
		 * mysql connect object
		 * @var object
		 */
		private $db;
		/**
		 * construct the mysql object and connect
		 */
		function __construct()
		{
			$this->mySql = new MySql();
			$this->db = $this->mySql->dbConnect();
		}

		/**
		 * this function is for info log content
		 * @param  String $content log opearate content
		 * @return true or false          the insert result
		 */
		public function infoLog($content)
		{
			$query = $this->constructQuery($content, 1);
			$result = $this->db->query($query);
			return $result;
		}

		/**
		 * this function is for debug level log
		 * @param  String $content log operate content
		 * @return true or false          the insert result
		 */
		public function debugLog($content)
		{
			$query = $this->constructQuery($content, 2);
			$result = $this->db->query($query);
			return $result;
		}

		/**
		 * this function is for warnLog level log
		 * @param  String $content log operate content
		 * @return true or false          the insert result
		 */
		public function warnLog($content)
		{
			$query = $this->constructQuery($content, 3);
			$result = $this->db->query($query);
			return $result;
		}

		/**
		 * this function is for errorLog level log
		 * @param  String $content log operate content
		 * @return true or false          the insert result
		 */
		public function errorLog($content)
		{
			$query = $this->constructQuery($content, 4);
			$result = $this->db->query($query);
			return $result;
		}

		/**
		 * this function is for construct a query for execute in database
		 * @param  string  $content log content
		 * @param  integer $logType log type
		 * @return string           the query
		 */
		private function constructQuery($content ="", $logType = 0)
		{
			$query = "insert into log(log_time, log_content, log_type) values(now(), '".$content."', '".$logType."')";
			return $query;
		}
	}

 ?>