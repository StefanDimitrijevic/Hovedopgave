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
    <link rel="stylesheet" href="css/fileupload.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_SESSION['users_id'])) { ?>
            <form class="sign-up" action="upload.php" method="POST" enctype="multipart/form-data">
                <div class="form-content">
                    <input class="inputs" type="text" name="filename" placeholder="Fil navn..." required>
                </div>
                <div class="form-content">
                    <input class="inputs" type="text" name="filetitle" placeholder="Billede titel..." required>
                </div>
                <div class="form-content">
                    <input class="inputs" type="text" name="filedesc" placeholder="Billede beskrivelse..." required>
                </div>
                <div class="form-content">
                    <input class="inputs" type="text" name="filelink" placeholder="Link til hjemmeside..." required>
                </div>
                <div class="form-content">
                    <input class="inputs" type="file" name="file" required>
                </div>
                <div class="form-content">
                    <select class="inputs" name="doorid" required>
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
                </div>
                <button class="btn" type="submit" name="submit">UPLOAD</button>
            </form>
        <?php } else {} ?>
    </div>
</body>
</html>