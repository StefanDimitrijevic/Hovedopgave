<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php 
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
		header("Location: /Calendar/fileupload.php");
			
			$_SESSION['users_id'] = $id;
			$_SESSION['uname'] = $un;
		} else {
			echo 'Illegal username/password combination';
		}	
?>

</body>
</html>