<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kalender</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/snowstorm-min.js"></script>
</head>

<body>
    <div class="container">
        <?php 
        if (isset($_SESSION['users_id'])) { ?>
        <div class="nav">
            <p class="upload">Upload</p>
            <a class="log-out" href="logout.php">Log ud</a>
        </div>
        <?php } else { ?>
            <br> <br>
            <?php } ?>

        <div class="offset">
            <p class="close">X</p>

            <?php
            if (isset($_SESSION['users_id'])) { ?>
                <div class="hmm">
                    <form class="form" action="upload.php" method="POST" enctype="multipart/form-data">
                        <div class="form-content">
                            <label class="labels" for="">Filnavn</label>
                            <input class="inputs" type="text" name="filename" placeholder="Fil navn..." required>
                        </div>
                        <div class="form-content">
                            <label class="labels" for="">Billede titel</label>
                            <input class="inputs" type="text" name="filetitle" placeholder="Billede titel..." required>
                        </div>
                        <div class="form-content">
                            <label class="labels" for="">Link til hjemmeside</label>
                            <input class="inputs" type="text" name="filelink" placeholder="www.minside.dk" required>
                        </div>
                        <div class="form-content">
                            <label class="labels" for="">Billede beskrivelse</label>
                            <textarea name="filedesc" placeholder="Billede beskrivelse..." required></textarea>
                        </div>
                        <div class="form-content">
                            <label class="labels" for="">Vælg hvilken låge billedet skal uploades til</label>
                            <select class="select" name="doorid" required>
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
                        <div class="form-content">
                            <label class="labels" for="">Upload billede (jpg, png, jpeg)</label>
                            <input class="inputs-file" type="file" name="file" required>
                        </div>
                        <div class="form-content">
                            <button class="btn" type="submit" name="submit">UPLOAD</button>
                        </div>
                    </form>
                </div>
            <?php } else {} ?>

        </div>

        <div class="intro">
            <h1 class="header">2019 adventskalender</h1>
            <h3 class="description">Kom tilbage hver adventssøndag for at åbne en ny gave!</h3>
        </div>
        <div class="wrap-flex">
            <div class="wrap">
                <div class="door">
                    <p class="number-text">1</p>
                </div>
                <div class="inside" id="inside-one">
                    <p class="inside-text">Tryk for at åbne gaven!</p>
                </div>
            </div>

            <div class="wrap">
                <div class="door">
                    <p class="number-text">2</p>
                </div>
                <div class="inside" id="inside-two">
                    <p class="inside-text">Tryk for at åbne gaven!</p>
                </div>
            </div>

            <div class="wrap">
                <div class="door">
                    <p class="number-text">3</p>
                </div>
                <div class="inside" id="inside-three">
                    <p class="inside-text">Tryk for at åbne gaven!</p>
                </div>
            </div>

            <div class="wrap">
                <div class="door">
                    <p class="number-text">4</p>
                </div>
                <div class="inside" id="inside-four">
                    <p class="inside-text">Tryk for at åbne gaven!</p>
                </div>
            </div>
        </div>

        <?php 
        include_once "dbcon.php";
        $sql = "SELECT titleContent, descContent, linkContent, imgNameContent FROM content WHERE calendarDoors_idCalendarDoors=1 ORDER BY idContent DESC";
        $stmt = $link->prepare($sql);
        $stmt->bind_result($title, $desc, $siteLink, $fullName);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) { ?>
        <div class="popup" id="first-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="images/christmas-background.png" alt="">
                </div>
                <h1 class="popup-header">Titel</h1>
                <p class="popup-desc">Beskrivelse</p>
                <button class="btn">
                    <a href="http://www.google.com" target="_blank">Se side</a>
                </button>
            </div>
        </div>
        <?php } else {
            while($stmt->fetch()) { ?>

        <div class="popup" id="first-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="uploads/<?=$fullName?>" alt="">
                </div>
                <h1 class="popup-header"><?=htmlentities($title)?></h1>
                <p class="popup-desc"><?=htmlentities($desc)?></p>
                <button class="btn">
                    <a href="http://<?=htmlentities($siteLink)?>" target="_blank">Se side</a>
                </button>
            </div>
        </div>

        <?php }
        } ?>

        <?php 
        include_once "dbcon.php";
        $sql = "SELECT titleContent, descContent, linkContent, imgNameContent FROM content WHERE calendarDoors_idCalendarDoors=2 ORDER BY idContent DESC";
        $stmt = $link->prepare($sql);
        $stmt->bind_result($title, $desc, $siteLink, $fullName);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) { ?>
        <div class="popup" id="second-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="images/christmas-background.png" alt="">
                </div>
                <h1 class="popup-header">Titel</h1>
                <p class="popup-desc">Beskrivelse</p>
                <button class="btn">
                    <a href="http://www.google.com" target="_blank">Se side</a>
                </button>
            </div>
        </div>
        <?php } else {
            while($stmt->fetch()) { ?>

        <div class="popup" id="second-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="uploads/<?=$fullName?>" alt="">
                </div>
                <h1 class="popup-header"><?=htmlentities($title)?></h1>
                <p class="popup-desc"><?=htmlentities($desc)?></p>
                <button class="btn">
                    <a href="http://<?=htmlentities($siteLink)?>" target="_blank">Se side</a>
                </button>
            </div>
        </div>

        <?php }
        } ?>

        <?php 
        include_once "dbcon.php";
        $sql = "SELECT titleContent, descContent, linkContent, imgNameContent FROM content WHERE calendarDoors_idCalendarDoors=3 ORDER BY idContent DESC";
        $stmt = $link->prepare($sql);
        $stmt->bind_result($title, $desc, $siteLink, $fullName);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) { ?>
        <div class="popup" id="third-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="images/christmas-background.png" alt="">
                </div>
                <h1 class="popup-header">Titel</h1>
                <p class="popup-desc">Beskrivelse</p>
                <button class="btn">
                    <a href="http://www.google.com" target="_blank">Se side</a>
                </button>
            </div>
        </div>
        <?php } else {
            while($stmt->fetch()) { ?>

        <div class="popup" id="third-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="uploads/<?=$fullName?>" alt="">
                </div>
                <h1 class="popup-header"><?=htmlentities($title)?></h1>
                <p class="popup-desc"><?=htmlentities($desc)?></p>
                <button class="btn">
                    <a href="http://<?=htmlentities($siteLink)?>" target="_blank">Se side</a>
                </button>
            </div>
        </div>

        <?php }
        } ?>


        <?php 
        include_once "dbcon.php";
        $sql = "SELECT titleContent, descContent, linkContent, imgNameContent FROM content WHERE calendarDoors_idCalendarDoors=4 ORDER BY idContent DESC";
        $stmt = $link->prepare($sql);
        $stmt->bind_result($title, $desc, $siteLink, $fullName);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) { ?>
        <div class="popup" id="fourth-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="images/christmas-background.png" alt="">
                </div>
                <h1 class="popup-header">Titel</h1>
                <p class="popup-desc">Beskrivelse</p>
                <button class="btn">
                    <a href="http://www.google.com" target="_blank">Se side</a>
                </button>
            </div>
        </div>
        <?php } else {
            while($stmt->fetch()) { ?>

        <div class="popup" id="fourth-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="uploads/<?=$fullName?>" alt="">
                </div>
                <h1 class="popup-header"><?=htmlentities($title)?></h1>
                <p class="popup-desc"><?=htmlentities($desc)?></p>
                <button class="btn">
                    <a href="http://<?=htmlentities($siteLink)?>" target="_blank">Se side</a>
                </button>
            </div>
        </div>

        <?php }
        } ?>

    </div>

    <script src="js/doors.js"></script>
    <script src="js/navigation.js"></script>
    <script src="js/customSnow.js"></script>

</body>

</html>