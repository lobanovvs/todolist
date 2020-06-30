<?php
    $id = $_POST['id'];
    $db = 'mysql:host=fdb22.awardspace.net;dbname=3493522_lobanovvs';
	$sts = 0;
    $sth = $pdo->prepare("delete from tasks where id = :id");
    $sth->execute(array('id' => $id));
	$sth = $pdo->prepare("delete from log where task_id = :id");
    $sth->execute(array('id' => $id));
	$sts = 1;
	}
	header('Content-type: application/json');
	echo json_encode( ['sts' => $sts] );
?>