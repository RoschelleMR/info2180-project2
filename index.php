<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- <script src="login.js" type="text/javascript"></script> -->
  </head>
  <body>
    <div>
        <form action= "login.php" method="post">
        <?php if(isset($_GET['success'])) { ?>
                    <p class="success"> <?php echo $_GET['success']; ?></p>
                <?php } ?>
            <input type = "text" class = "form-control" id = "email" name = "email" placeholder = "Email address" required autofocus></br>
            <input type = "password" class = "form-control" id= "password" name = "password" placeholder = "Password" required></br>
            <button class = "sub_btn" type = "submit" name = "login">Login</button>
        </form>
        
      <div class="result"></div>
    </div>
  </body>
</html>
