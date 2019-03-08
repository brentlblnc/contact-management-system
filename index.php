<?php 
    

?>

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
    <?php include "header.html" ?>

    <div class="container">
        <div class="block">
            <p class="content">View your contact info below</p>
        </div>

        <div class="block">
            <p class="content">
                <a href="addContact.php" class="button is-success">Add Contact&nbsp;<i class="fas fa-plus"></i></a>
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
                    include "DbConnect.php";

                    $db = new DbConnect("localhost", "root", "", "cms");
                
                    $results = $db->select("SELECT * FROM contacts");
                    if (mysqli_num_rows($results) > 0) {
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo "<tr>";
                            echo "<td>".$row["firstName"]."</td>";
                            echo "<td>".$row["lastName"]."</td>";
                            echo "<td>".$row["address"]."</td>";
                            echo "<td>".$row["city"]."</td>";
                            echo "<td>".$row["phoneNumber"]."</td>";
                            echo "<td>".$row["email"]."</td>";
                            echo "<td>".$row["postalCode"]."</td>";
                            echo "<td>".$row["birthday"]."</td>";
                            echo <<<HERE
                                <td>
                                    <form action='EditController.php' method='POST'>
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
                                    <form action='DeleteController.php' method='POST'>
                                        <input type='hidden' name='delete' value='1'>
                                        <input type='hidden' name='id' value='$row[id]'>
                                        <input type='hidden' name='firstName' value='$row[firstName]'>
                                        <input type='hidden' name='lastName' value='$row[lastName]'>
                                        <button type='submit' class='button is-danger'><i class='fas fa-trash-alt'></i></button>
                                    </form>
                                </td>
HERE;
                            echo "</tr>";
                        }
                    } 
                ?>
            </table>
        </div>





    </div>
    

        <!-- <div class="block">
            <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, in.</p>
            <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, in.</p>
        </div>

        <div class="block">
            <button class="button">Button</button>
            <button class="button is-white">Button</button>
            <button class="button is-light">Button</button>
            <button class="button is-dark">Button</button>
            <button class="button is-black">Button</button>
            <button class="button is-link">Button</button>
        </div>

        <div class="block">
            <a href="" class="button is-primary is-outlined">Primary</a>
            <a href="" class="button is-info is-outlined">Primary</a>
            <a href="" class="button is-success is-outlined">Primary</a>
            <a href="" class="button is-warning is-outlined">Primary</a>
            <a href="" class="button is-danger is-outlined">Primary</a>
        </div>

        <div class="block">
            <a href="" class="button is-hovered">Hovered</a>
            <a href="" class="button is-focused">Hovered</a>
            <a href="" class="button is-active">Hovered</a>
            <a href="" class="button is-loading">Hovered</a>
            <a href="" class="button" disabled>Disabled</a>
        </div>

        <div class="block">
            <div class="box">
                <h1 class="title">Hello world!</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, hic.</p>
            </div>
        </div>

        <div class="block">
            <div class="notification">
                <button class="delete"></button>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, dicta!
            </div>
            <div class="notification is-primary">
                <button class="delete"></button>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, dicta!
            </div>
            <div class="notification is-info">
                <button class="delete"></button>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, dicta!
            </div>
            <div class="notification is-success">
                <button class="delete"></button>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, dicta!
            </div>
        </div>

        <div class="block">
            <span class="tag">Hello</span>
        </div>

        <div class="block">
            <form action="">
                <div class="field">
                    <label class="label">Name</label>
                    <input type="text" class="input is-success" placeholder="Enter Name">
                </div>
                <div class="field">
                    <label class="label">Name</label>
                    <input type="text" class="input is-danger" placeholder="Enter Name">
                </div>
            </form>

            <div class="block">
                <div class="field has-addons">
                    <p class="control">
                        <input type="text" class="input" placeholder="Enter keywords...">
                    </p>
                    <p class="control">
                        <a href="" class="button is-info">Search</a>
                    </p>
                </div>
            </div>
        </div> -->
    
</body>
</html>