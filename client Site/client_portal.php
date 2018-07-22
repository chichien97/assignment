<?php
session_start();
include "../php/connection.php";
mysqli_close($conn);
 ?>
<html>
  <head>
    <title>Customer Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/temp.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    </style>
  </head>
  <body>
    <div class="login-main">
      <div class="bd-img">
        <div>
          <h1 class="login-title" style="text-align:center;">invoice System</h1>
        </div>
        <form action="../php/login.php" method="post">
          <div class="login-container">
            <div class="login-content">
              <div class="login-usernm">
                <label for="usernm_login" class="login-label"><i class="fa fa-user btn-icon"></i>Username</label>
                <br>
                <input type="text" name="username" id="usernm_login" class="usrnm" placeholder="Enter Username">
              </div>
              <div class="login-pwd">
                <label for="pwd_login" class="login-label"><i class="fa fa-lock btn-icon"></i>Password</label>
                <br>
                <input type="password" name="password" id="pwd_login" class="pwd" placeholder="Enter Passsword">
              </div>
              <div class="login-btn">
                <input type="hidden" name="validation" value="client">
                <!-- <i class="fa fa-unlock-alt btn-icon"></i><input type="submit" value="login"> -->
                <button type="submit" name="adminbtn" class="btn btn-submit" onclick="location.href='client_portal.php'"><i class="fa fa-unlock-alt btn-icon"></i>Login</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
