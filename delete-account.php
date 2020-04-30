<?php
    $conn = mysqli_connect("localhost", "root", "", "users");
   if( isset($_GET['accountNumber']) && isset($_GET['pin']) ){
    $name = $_GET["name"];
    $pin = $_GET["pin"];
    $sql = "SELECT * from bankAccount where accountNumber = $name ";
    echo $sql;
    mysqli_query($conn,$sql);
    $records = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($records) ){
       echo $row['accountBalance'];
       echo $row['pin'];
    }
    echo $_GET["name"];
    $delete = "delete from students where username='$_GET[name]'";
    echo $delete;
    if(mysqli_query($conn,$delete) ){
        echo "username deleted";
    }
    else{
        echo "username could not be found";
    }
   }

?>

<!-- <!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<form method = "get">
username<input type="text" name ="name"><br>
<input type ="submit">
</form>

</body>
</html>  -->
<html>
<body>
<form>
    
</form>



</body>
</html>

<html>
  <head> <!This is the title of the webpage>
    <meta charset="utf-8">
    <title>Deposit</title>
    <link rel="stylesheet" href="deposit.css">
  </head>

  <body>  <!This is the title page>
      <div class = "row">
          <div id = "grad1", class = "header"><h1>
           <p class = "custom1"> BANK NAME</p>
         </h1></div>
          <div id = ""
      		<div class="topnav">
      			<a href="" style="float: right;"> Sign Out</a>
      			<a href="userpage2.php" style="float: left;"> Return</a>
      				</div>
      			</div>

          <div class = "rightcolumn">
                <div class= "account">
                       <h2> Navigation </h2>
                       <a href="userpage2.php" style="float: left;"> Home</a>
                       <a href= "" style= "float: left;"> Account Settings</a>
                       <a href= "" style= "float: left;"> </a>
                </div>
          </div>

            <div class = "leftcolumn">
                  <div class = "column">
                        <h1> Delete Account</h1>
                        <form>
                            <p>Account #: <input type="number" name = "name"> </p>
                            <p>PIN #: <input type="number" name = "pin"> </p>
                            <input type="submit">
                        </form>
                       </div>
                  </div>

  </body>
</html>
