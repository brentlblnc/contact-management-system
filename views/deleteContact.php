<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Contact Manager: Delete Contact</title>
</head>
<body>
    <?php 
        include "../header.php";
        if (!isset($_SESSION['authenticated'])) {
            header("Location: login.php");
        }
        $temp = $_SESSION['contact'];
    ?>

    <div class="container">
        <div class="block">
            <p class="content">Are you sure you want to delete the following contact?</p>
            <p class="content"><strong><?php echo $temp['firstName'].' '.$temp['lastName']?></strong></p>
            <div class="field">
                <form action="../controllers/DeleteController.php" method="POST">
                    <input type="hidden" name="deleteSubmit" value="1">
                    <button type="submit" class="button is-danger">Delete</button>
                    <a href="../index.php" class="button is-link">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>