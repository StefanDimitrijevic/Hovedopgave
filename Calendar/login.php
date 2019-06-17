<?php
	session_start();
 
$un = filter_input(INPUT_POST, 'un') or die ('Missing or illegal un parameter');
$pw = filter_input(INPUT_POST, 'pw') or die ('Missing or illegal pw parameter');
	$pwhash = password_hash($pw, PASSWORD_DEFAULT);
	
	require_once('dbcon.php');
	
	$sql = 'SELECT id, pwhash FROM calendarUsers WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt ->bind_param('s', $un);
	$stmt ->execute();
	$stmt ->bind_result($id, $pwhash);
	
	while ($stmt->fetch()) {}
	
	if(password_verify($pw, $pwhash)){
		header("Location: index.php");
			
		$_SESSION['users_id'] = $id;
		$_SESSION['uname'] = $un;
	} else {
			echo 'Illegal username/password combination';
	}