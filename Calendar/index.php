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
            <div class="wrap">
                <div class="door">
                    <p class="number-text">1</p>
                </div>
                <div class="inside">
                </div>
            </div>
            
            <div class="wrap">
                <div class="door">
                    <p class="number-text">2</p>
                </div>
                <div class="inside">
                </div>
            </div>
    
            <div class="wrap">
                <div class="door">
                    <p class="number-text">3</p>
                </div>
                <div class="inside">
                </div>
            </div>
    
            <div class="wrap">
                <div class="door">
                    <p class="number-text">4</p>
                </div>
                <div class="inside">
                </div>
            </div>

        <?php 
        include_once "dbcon.php";
        $sql = "SELECT titleContent, descContent, linkContent, imgNameContent FROM content WHERE calendarDoors_idCalendarDoors=1 ORDER BY idContent DESC";
        $stmt = $link->prepare($sql);
        $stmt->bind_result($title, $desc, $siteLink, $fullName);
        $stmt->execute();
        while($stmt->fetch()) { ?>
        
        <div class="popup">
            <div class="hm">
                <p class="exit">x</p>
                <h1><?=$title?></h1>
                <h3><?=$desc?></h3>
                <img class="popup-image" src="uploads/<?=$fullName?>" alt="">
                <a href="http://<?=$siteLink?>" target="_blank">Tryk for at gå til produktet</a>
            </div>
        </div> 
        
        <?php } ?> 

        <?php
            if(isset($_SESSION['users_id'])){
        ?>
            <a href="logout.php"> Logged in as <?=$_SESSION['uname']?></a>
            <?php } else {} ?>
    </div>

    <script src="js/doors.js"></script>

</body>
</html>