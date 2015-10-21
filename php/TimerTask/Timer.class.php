<?php 
	/**
	* Timer for task
	* run the task per 10 seconds default
	*/
	class Timer
	{
		private static $time;
		function __construct()
		{
			$this->time = 1;
		}
		
		/**
		 * Setter for time
		 * @param time value to set
		 * @return self
		 */
		public function setTime($time)
		{
		    $this->time = $time;
		    return $this;
		}
		/**
		 * run the task recyle	
		 * @param  object $task this is the task for run
		 * @return 
		 */
		public function execute($task)
		{
			ignore_user_abort(true);
			while (1) {
				$task->run();
				ob_flush();
				flush();
				sleep($this->time);
			}
		}
	}

 ?>