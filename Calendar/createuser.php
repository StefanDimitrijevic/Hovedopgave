<?php
	session_start();
?>

<?php 
$un = filter_input(INPUT_POST, 'un') or die ('Missing or wrong username');
$pw = filter_input(INPUT_POST, 'pw') or die ('Missing or wrong password');

	$pwhash = password_hash($pw, PASSWORD_DEFAULT);
	
	require_once('dbcon.php');
	
	$sql = 'INSERT INTO calendarUsers (username, pwhash) VALUES (?, ?)';
	$stmt = $link->prepare($sql);
	$stmt ->bind_param('ss', $un, $pwhash);
	$stmt ->execute();
	
	if ($stmt->affected_rows > 0 ){
		echo 'User '.$un.' created :-)';
		$_SESSION['users_id'] = $stmt->insert_id;
		$_SESSION['uname'] = $un;
	} else {
		echo 'Could not create user - username '.$un.' allready exists!';
	}
?>
