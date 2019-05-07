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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <div class="hihi">
                <form class="sign-up" action="createuser.php" method="POST">
                    <div class="form-content">
                        <input class="inputs" type="text" name="un" placeholder="Username" autocomplete="date" required>
                    </div>
                    <div class="form-content">
                        <input class="inputs" type="password" name="pw" placeholder="Password" autocomplete="date" required>
                    </div>
                    <button class="btn" type="submit">Create User</button>
                </form>
            </div>
            <div class="hihi">
                <form class="sign-up" action="login.php" method="POST">
                    <div class="form-content">
                        <input class="inputs" type="text" name="un" placeholder="Username" required>
                    </div>
                    <div class="form-content">
                        <input class="inputs" type="password" name="pw" placeholder="Password" required>
                    </div>
                    <button class="btn" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>