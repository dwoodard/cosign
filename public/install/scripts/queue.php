<?php
/*
*                                      _
*                                     | |
*   __ _ _   _  ___ _   _  ___   _ __ | |__  _ __
*  / _` | | | |/ _ \ | | |/ _ \ | '_ \| '_ \| '_ \
* | (_| | |_| |  __/ |_| |  __/_| |_) | | | | |_) |
*  \__, |\__,_|\___|\__,_|\___(_) .__/|_| |_| .__/
*     | |                       | |         | |
*     |_|                       |_|         |_|
*/

if (!$_POST || !$project_root_path) {
	die("missing Data");
}


$queue_path = $project_root_path.'/app/config/queue.php';

$queue_content = <<<QUEUE_CONTENT
<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Default Queue Driver
	|--------------------------------------------------------------------------
	|
	| The Laravel queue API supports a variety of back-ends via an unified
	| API, giving you convenient access to each back-end using the same
	| syntax for each one. Here you may set the default queue driver.
	|
	| Supported: "sync", "beanstalkd", "sqs", "iron"
	|
	*/

	'default' => 'beanstalkd',

	/*
	|--------------------------------------------------------------------------
	| Queue Connections
	|--------------------------------------------------------------------------
	|
	| Here you may configure the connection information for each server that
	| is used by your application. A default configuration has been added
	| for each back-end shipped with Laravel. You are free to add more.
	|
	*/

	'connections' => array(

		'sync' => array(
			'driver' => 'sync',
		),

		'beanstalkd' => array(
			'driver' => 'beanstalkd',
			'host'   => '{$_POST['queue-beanstalkd-host']}',
			'queue'  => '{$_POST['queue-beanstalkd-queue']}',
		),

		'sqs' => array(
			'driver' => 'sqs',
			'key'    => '',
			'secret' => '',
			'queue'  => '',
			'region' => '',
		),

		'iron' => array(
			'driver'  => 'iron',
			'project' => '',
			'token'   => '',
			'queue'   => '',
		),

	),

	/*
	|--------------------------------------------------------------------------
	| Failed Queue Jobs
	|--------------------------------------------------------------------------
	|
	| These options configure the behavior of failed queue job logging so you
	| can control which database and table are used to store the jobs that
	| have failed. You may change them to any database / table you wish.
	|
	*/

	'failed' => array(

	        'database' => 'mysql', 'table' => 'failed_jobs',

	),

);



QUEUE_CONTENT;

file_put_contents($queue_path, $queue_content);


 ?>