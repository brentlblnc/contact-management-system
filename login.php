<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Contact Manager: Login</title>
</head>
<body>
    <?php include "header.html" ?>

    <div class="container">
        <div class="block">
            <p class="content">Enter your credentials below:</p>
            <form action="LoginController.php" method="POST">
                <div class="field">
                    <input type="text" name="username" id="username" class="input" placeholder="Username">
                </div>
                <div class="field">
                    <input type="password" name="password" id="password" class="input" placeholder="Password">
                </div>
                <div class="field">
                    <button type="submit" class="button is-link">Log In</button>
                    <a href="index.php" class="button is-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>