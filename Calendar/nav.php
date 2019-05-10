<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>navbar</title>
</head>
<body>
    <?php
    if(isset($_SESSION['users_id'])) { ?>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Forside</a>
                </li>
                <li>
                    <a href="fileupload.php">Upload</a>
                </li>
                <li>
                    <a href="logout.php">Log ud</a>
                </li>
            </ul>
        </nav>
    <?php } ?>
</body>
</html>