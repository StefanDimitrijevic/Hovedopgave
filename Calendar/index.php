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
</head>
<body>
    <div class="container">

        <?php
            include_once('nav.php');
        ?>

        <div class="intro">
            <h1 class="header">2019 advents calendar</h1>
            <h3 class="description">Come back each sunday in december to receive a gift!</h3>
        </div>
    <div class="wrap-flex">
        <div class="wrap">
            <div class="door">
                <p class="number-text">1</p>
            </div>
            <div class="inside" id="inside-one">
            </div>
        </div>
        
        <div class="wrap">
            <div class="door">
                <p class="number-text">2</p>
            </div>
            <div class="inside" id="inside-two">
            </div>
        </div>

        <div class="wrap">
            <div class="door">
                <p class="number-text">3</p>
            </div>
            <div class="inside" id="inside-three">
            </div>
        </div>

        <div class="wrap">
            <div class="door">
                <p class="number-text">4</p>
            </div>
            <div class="inside" id="inside-four">
            </div>
        </div>
    </div>

        <?php 
        include_once "dbcon.php";
        $sql = "SELECT titleContent, descContent, linkContent, imgNameContent FROM content WHERE calendarDoors_idCalendarDoors=1 ORDER BY idContent DESC";
        $stmt = $link->prepare($sql);
        $stmt->bind_result($title, $desc, $siteLink, $fullName);
        $stmt->execute();
        while($stmt->fetch()) { ?>
        
        <div class="popup" id="first-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="uploads/<?=$fullName?>" alt="">
                </div>
                <h1><?=$title?></h1>
                <h3><?=$desc?></h3>
                <button class="btn">
                    <a href="http://<?=$siteLink?>" target="_blank">Se side</a>
                </button>
            </div>
        </div> 
        
        <?php } ?>


        <?php 
        include_once "dbcon.php";
        $sql = "SELECT titleContent, descContent, linkContent, imgNameContent FROM content WHERE calendarDoors_idCalendarDoors=2 ORDER BY idContent DESC";
        $stmt = $link->prepare($sql);
        $stmt->bind_result($title, $desc, $siteLink, $fullName);
        $stmt->execute();
        while($stmt->fetch()) { ?>
        
        <div class="popup" id="second-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="uploads/<?=$fullName?>" alt="">
                </div>
                <h1><?=$title?></h1>
                <h3><?=$desc?></h3>
               <button class="btn">
                    <a href="http://<?=$siteLink?>" target="_blank">Se side</a>
               </button>
            </div>
        </div> 
        
        <?php } ?>


        <?php 
        include_once "dbcon.php";
        $sql = "SELECT titleContent, descContent, linkContent, imgNameContent FROM content WHERE calendarDoors_idCalendarDoors=3 ORDER BY idContent DESC";
        $stmt = $link->prepare($sql);
        $stmt->bind_result($title, $desc, $siteLink, $fullName);
        $stmt->execute();
        while($stmt->fetch()) { ?>
        
        <div class="popup" id="third-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="uploads/<?=$fullName?>" alt="">
                </div>
                <h1><?=$title?></h1>
                <h3><?=$desc?></h3>
               <button class="btn">
                    <a href="http://<?=$siteLink?>" target="_blank">Tryk for at gå til produktet</a>
               </button>
            </div>
        </div> 
        
        <?php } ?>


        <?php 
        include_once "dbcon.php";
        $sql = "SELECT titleContent, descContent, linkContent, imgNameContent FROM content WHERE calendarDoors_idCalendarDoors=4 ORDER BY idContent DESC";
        $stmt = $link->prepare($sql);
        $stmt->bind_result($title, $desc, $siteLink, $fullName);
        $stmt->execute();
        while($stmt->fetch()) { ?>
        
        <div class="popup" id="fourth-popup">
            <div class="popup-content">
                <p class="exit">x</p>
                <div class="image-holder">
                    <img class="popup-image" src="uploads/<?=$fullName?>" alt="">
                </div>
                <h1><?=$title?></h1>
                <h3><?=$desc?></h3>
               <button class="btn">
                    <a href="http://<?=$siteLink?>" target="_blank">Tryk for at gå til produktet</a>
               </button>
            </div>
        </div> 
        
        <?php } ?>
    </div>

    <script src="js/doors.js"></script>

</body>
</html>