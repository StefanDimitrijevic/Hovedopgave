<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/snowstorm-min.js"></script>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <div class="form-holder create">
                <form class="sign-up" action="createuser.php" method="POST">
                    <div class="form-content">
                        <label class="labels" for="">Brugernavn</label>
                        <input class="inputs" type="text" name="un" placeholder="Username" autocomplete="no" required>
                    </div>
                    <div class="form-content">
                        <label class="labels" for="">Password</label>
                        <input class="inputs" type="password" name="pw" placeholder="Password" autocomplete="no" required>
                    </div>
                    <button class="btn" type="submit">Opret bruger</button>
                </form>
            </div>
            <div class="form-holder login">
                <form class="sign-up" action="login.php" method="POST">
                    <div class="form-content">
                        <label class="labels" for="">Brugernavn</label>
                        <input class="inputs" type="text" name="un" placeholder="Brugernavn" autocomplete="no" required>
                    </div>
                    <div class="form-content">
                        <label class="labels" for="">Password</label>
                        <!-- <i class="fas fa-lock"></i> -->
                        <input class="inputs" type="password" name="pw" placeholder="Kodeord" autocomplete="no" required> 
                    </div>
                    <p class="opret">Ikke bruger endnu? <span class="opret-click">opret her</span> </p>
                    <button class="btn" type="submit">Log ind</button>
                </form>
            </div>
        </div>
    </div>

    <script src="js/customSnow.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>