<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Contact Manager: Add Contact</title>
</head>
<body>
    <?php include "header.html" ?>
    
    <div class="container">
        <div class="block">
            <p class="content">Add new contact's details in the fields below:</p>

            <form action="AddController.php" method="POST">
                <div class="field">
                    <input type="text" name="firstName" class="input" placeholder="First Name">
                </div>
                <div class="field">
                    <input type="text" name="lastName" class="input" placeholder="Last Name">
                </div>
                <div class="field">
                    <input type="text" name="address" class="input" placeholder="Street Address">
                </div>
                <div class="field">
                    <input type="text" name="city" class="input" placeholder="City">
                </div>
                <div class="field">
                    <input type="text" name="province" class="input" placeholder="Province">
                </div>
                <div class="field">
                    <input type="tel" name="phone" class="input" placeholder="Phone Number">
                </div>
                <div class="field">
                    <input type="email" name="email" class="input" placeholder="Email">
                </div>
                <div class="field">
                    <input type="text" name="postalCode" class="input" placeholder="Postal Code">
                </div>
                <div class="field">
                    <input type="date" name="DOB" class="input" placeholder="Date of Birth">
                </div>
                <div class="field">
                    <button type="submit" class="button is-link">Submit</button>
                    <a href="index.php" class="button is-danger">Cancel</a>
                </div>

            </form>
        </div>
    </div>
    
</body>
</html>