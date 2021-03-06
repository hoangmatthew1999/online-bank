<?php
if (isset($_POST["username"]) && isset($_POST["password"])){

      $conn = mysqli_connect("localhost", "root", "", "userbank");

      if(!$conn){
          die("Connection failed" . mysqli_connect_error());
      }

      $username = $_POST['username'];
      $pin = $_POST['password'];
      if (empty($username) || empty($pin)){
            echo "variables empty";
            exit();
      }
      else {
            $sql = "SELECT * FROM useraccounts WHERE userID=? OR email=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "SQL error";
                  exit();
            }
            else{
                  mysqli_stmt_bind_param($stmt, "si", $username, $username);
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  if ($row = mysqli_fetch_assoc($result)){
                        $pwdCheck = password_verify($pin, $row['pin']);
                        echo ( 'Pin: '.$row['pin'] );
                        if(!($pin == $row['pin'])){
                              echo "Error: password incorrect.";
                        }
                        else{
                              session_start();
                              $_SESSION['userID']= $row['userID'];

                              echo("Session ID: " .$_SESSION['userID']);
                              $_SESSION['fname']= $row['fname'];
                              $_SESSION['lname']= $row['lname'];
                              $_SESSION['username']= $row['username'];
                              $_SESSION['email']= $row['email'];

                        }
                  }
                  else{
                        echo "Data match error.";
                  }
            }
      }
}
else {
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="homepage.css">
      </head>

    <body><!This is the login page>
     <!MENU BAR>
     <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="">Checking Account</a>
        <a href="">Savings Account</a>
        <a href="">Investing</a>
        <a href="">Better Money Habits</a>
     </div>

     <div id="main">

       <div class="header">
         <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
         <!TOP BAR>
         <a href="homepage.php", class="logo", style="color: #FFFFE0">Bank Name</a>
      </div>

      <div class="topnav">
        <a class="active" href="homepage.php">Home</a>
        <a href="homepage.php#news">News</a>
        <a href="homepage.php#contact">Contact</a>
        <a href="homepage.php#about">About</a>
        <div class="header-right">
          <a class="active" href="register.php">Register</a>
        </div>
      </div>
      <br>


  <div id= "form">
        <h2>Login</h2>
          <form action = "login.php" method="post">
                  <input type= "text" name = "username" placeholder = "username/email">
                  <input type= "password" name = "password" placeholder = "pin">
            <button type = "submit" name= "login-submit">Login</button>
      	</form>
            <main>
                  <?php
                        if(isset($_SESSION['username'])){
                              echo '<p>Logged IN</p>';
                        }
                        else{
                              echo '<p>Logged OUT</p>';
                        }
                  ?>
            </main>
</div>
</body>
