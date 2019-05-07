<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File upload</title>
</head>
<body>
    <?php
    if (isset($_SESSION['users_id'])) { ?>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="filename" placeholder="Fil navn..." required>
            <input type="text" name="filetitle" placeholder="Billede titel..." required>
            <input type="text" name="filedesc" placeholder="Billede beskrivelse..." required>
            <input type="text" name="filelink" placeholder="Link til hjemmeside..." required>
            <input type="file" name="file" required>
            <select name="doorid" required>
                <?php
                    require_once('dbcon.php');
                    $sql = "SELECT idCalendarDoors, doorNumber FROM calendarDoors";
                    $stmt = $link->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($doorId, $doorNum);

                    while($stmt->fetch()){
                        echo '<option value="'.$doorId.'">'.$doorNum.'</option>'.PHP_EOL;
                    }
                ?>
            </select>
            <button type="submit" name="submit">UPLOAD</button>
        </form>
    <?php } else {} ?>
</body>
</html>