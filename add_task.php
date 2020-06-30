<?php
header("Content-Type: application/json");
	$tmp = [];
    $data = $_POST['text'];
    $db = 'mysql:host=fdb22.awardspace.net;dbname=3493522_lobanovvs';
    $pdo = new PDO($db,'3493522_lobanovvs','test123!');
    $sth = $pdo->prepare("INSERT INTO tasks (task) VALUES (:task)");
    $sth->execute(array('task' => $data));
    $last_id = $pdo->lastInsertId();
	if($last_id){
	  $sth = $pdo->prepare("INSERT INTO log (ip,date,task_id) VALUES (:ip, now(), :task_id)");
      $sth->execute(array('ip' => ip2long($_SERVER['REMOTE_ADDR']), 'task_id' => $last_id));
	  $tmp = ['id' => $last_id, 'task' => $data];
	}
	echo json_encode( $tmp );
?>