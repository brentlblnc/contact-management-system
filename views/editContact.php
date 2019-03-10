<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Contact Manager: Edit Contact</title>
</head>
<body>
    <?php
        include "../header.php";
        if (!isset($_SESSION['authenticated'])) {
            header("Location: login.php");
        }
        $temp = $_SESSION['editContact'];
    ?>

    <div class="container">
        <div class="block">
            <p class="content">Edit your contact's details below:</p>
            
            <form action="../controllers/EditController.php" method="POST">
                <input type="hidden" name="editSubmit" value="1">
                <?php
                echo <<<HERE
                    <input type="hidden" name="id" value='$temp[id]'>
                    <div class="field">
                        <input type="text" name="firstName" class="input" value='$temp[firstName]' placeholder="First Name" required>
                    </div>
                    <div class="field">
                        <input type="text" name="lastName" class="input" value='$temp[lastName]' placeholder="Last Name" required>
                    </div>
                    <div class="field">
                        <input type="text" name="address" class="input" value='$temp[address]' placeholder="Street Address" required>
                    </div>
                    <div class="field">
                        <input type="text" name="city" class="input" value='$temp[city]' placeholder="City" required>
                    </div>
                    <div class="field">
                        <input type="tel" name="phone" class="input" value='$temp[phone]' placeholder="Phone Number" required>
                    </div>
                    <div class="field">
                        <input type="email" name="email" class="input" value='$temp[email]' placeholder="Email" required>
                    </div>
                    <div class="field">
                        <input type="text" name="postalCode" class="input" value='$temp[postalCode]' placeholder="Postal Code" required>
                    </div>
                    <div class="field">
                        <input type="date" name="DOB" class="input" value='$temp[birthday]' placeholder="Date of Birth" required>
                    </div>
                    <div class="field">
                        <button type="submit" class="button is-link">Submit</button>
                        <a href="../index.php" class="button is-danger">Cancel</a>
                    </div>
HERE;
                ?>
            </form>
        </div>
    </div>
</body>
</html>