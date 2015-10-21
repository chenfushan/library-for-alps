<?php 
	require_once 'Task.class.php';
	require_once 'Timer.class.php';

	$task = new Task();
	$timer = new Timer();
	// set the recyle time (second)
	$timer->setTime(10);
	//execute the task
	$timer->execute($task);

 ?>
