<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dolphin_CRM</title>
        <meta charset= "utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="adduser.css">
        <script src="adduser.js"></script>
    </head>
    <body>
        <?php include("header.php");?>
        <div class="container">
            <?php include("sidebar.php");?>
            <div class="addform">


                <h1>New User</h1>
                <div id="msg_a" class="message"></div>
                <form method="post" action="" id="signup" class="text-field">
                   
                <div class="form-group c1" >
                    <label for="fname">Firstname</label><br>
                    <input id="f_name" name="firstname" type="text" class="txtbox"required><br><br>
                    </div>

                    <div class="form-group c2" >
                    <label for="lname">Lastname</label><br>
                    <input id="l_name" name="lastname" type="text" class="txtbox" required><br><br>
                    </div>

                    <div class="form-group c3" >
                    <label for="password">Password</label><br>
                    <input id="passwd" name="password" type="password" class="txtbox"required><br><br>
                    </div>


                    <div class="form-group c4" >
                    <label for="email">Email</label><br>
                    <input id="e_mail" name="email" type="email" class="txtbox"required><br><br>
                    </div>
                  
                    <select name="Status">
                    <option value="Admin">Admin</option>
                    <option value="Member">Member</option>
                    </select>
                    <button name="submit" type="submit" class="sbtn">Save</button> 

                </form>
            </div>
        </div>
    </body>
</html>