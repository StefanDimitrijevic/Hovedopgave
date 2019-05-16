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
            include_once('nav.php');
        ?>
        <div class="">
            <?php
            if (isset($_SESSION['users_id'])) { ?>
                <form class="form" action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="form-content">
                        <label class="labels" for="">Filnavn</label>
                        <input class="inputs" type="text" name="filename" placeholder="Fil navn..." required>
                    </div>
                    <div class="form-content">
                        <label class="labels" for="">Billed titel</label>
                        <input class="inputs" type="text" name="filetitle" placeholder="Billede titel..." required>
                    </div>
                    <div class="form-content">
                        <label class="labels" for="">Billed beskrivelse</label>
                        <textarea name="filedesc" placeholder="Billede beskrivelse..." required></textarea>
                    </div>
                    <div class="form-content">
                        <label class="labels" for="">Link til hjemmeside</label>
                        <input class="inputs" type="text" name="filelink" placeholder="www.minside.dk" required>
                    </div>
                    <div class="form-content">
                        <label class="labels" for="">Upload billede (jpg, png, jpeg)</label>
                        <input class="inputs-file" type="file" name="file" required>
                    </div>
                    <div class="form-content">
                        <label class="labels" for="">Vælg hvilken låge billedet skal uploades til</label>
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
                    </div>
                    <button class="btn" type="submit" name="submit">UPLOAD</button>
                </form>
            <?php } else {} ?>
        </div>
    </div>

    <script src="js/snowstorm-min.js"></script>
    <script src="js/customSnow.js"></script>
</body>
</html>