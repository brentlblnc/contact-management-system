<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Contact Manager: Home</title>
</head>
<body class="has-background-light">
    <?php 
        include "header.php";
        if (!isset($_SESSION['authenticated'])) {
            header("Location: views/login.php");
        }
    ?>

    <div class="container">
        <div class="block">
            <p class="content">View your contact info below</p>
        </div>

        <div class="block">
            <p class="content">
                <a href="views/addContact.php" class="button is-success">Add Contact&nbsp;<i class="fas fa-plus"></i></a>
            </p>
        </div>

        <div class="block overflow" style="width: 100%;">
            <table class="table is-bordered is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Street Address</th>
                        <th>City</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Postal Code</th>
                        <th>Date of Birth</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
                    include "models/DbConnect.php";

                    $db = new DbConnect("localhost", "root", "", "cms");
                
                    $results = $db->select("SELECT * FROM contacts");
                    if (mysqli_num_rows($results) > 0) {
                        while ($row = mysqli_fetch_assoc($results)) {
                            $birthdayArr = explode('-', $row["birthday"]);
                            $birthMonth = $birthdayArr[1];
                            echo "<tr>";
                            echo "<td>".$row["firstName"]."</td>";
                            echo "<td>".$row["lastName"]."</td>";
                            echo "<td>".$row["address"]."</td>";
                            echo "<td>".$row["city"]."</td>";
                            echo "<td>".$row["phoneNumber"]."</td>";
                            echo "<td>".$row["email"]."</td>";
                            echo "<td>".$row["postalCode"]."</td>";
                            echo "<td>".$row["birthday"];
                            echo date('m') == $birthMonth ? ' <i class="fas fa-birthday-cake"></i></td>' : '</td>';
                            echo <<<HERE
                                <td>
                                    <form action='controllers/EditController.php' method='POST'>
                                        <input type='hidden' name='edit' value='1'>
                                        <input type='hidden' name='id' value='$row[id]'>
                                        <input type='hidden' name='firstName' value='$row[firstName]'>
                                        <input type='hidden' name='lastName' value='$row[lastName]'>
                                        <input type='hidden' name='address' value='$row[address]'>
                                        <input type='hidden' name='city' value='$row[city]'>
                                        <input type='hidden' name='phone' value='$row[phoneNumber]'>
                                        <input type='hidden' name='email' value='$row[email]'>
                                        <input type='hidden' name='postalCode' value='$row[postalCode]'>
                                        <input type='hidden' name='birthday' value='$row[birthday]'>
                                        <button type='submit' class='button is-warning'><i class='fas fa-edit'></i></button>
                                    </form>
                                    <form action='controllers/DeleteController.php' method='POST'>
                                        <input type='hidden' name='delete' value='1'>
                                        <input type='hidden' name='id' value='$row[id]'>
                                        <input type='hidden' name='firstName' value='$row[firstName]'>
                                        <input type='hidden' name='lastName' value='$row[lastName]'>
                                        <button type='submit' class='button is-danger'><i class='fas fa-trash-alt'></i></button>
                                    </form>
                                    <a href='mailto:$row[email]' class='button is-link'><i class='fas fa-envelope'></i></a>
                                </td>
HERE;
                            echo "</tr>";
                        }
                    } 
                ?>
            </table>
        </div>
    </div>
    
</body>
</html>