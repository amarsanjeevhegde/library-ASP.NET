<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>WaveLength</title> 
<link rel="stylesheet" type="text/css" href="stylesheet.css"/>  <!--The php file is linked with the css, which allows for the design and layout aspect of the website.-->
</head>
<body>
<h1>WaveLength</h1> <!-- Name of website, acts as the logo.-->

<?php
/*$username,$password,$database,$hostname are variables. This variables are required as it defines the database, host and and server being used which will allow us to connect to the database and server. This variables are important in order to take and display the information on the website. In addition this is the first step in order for the login page to work.*/
$username = "ashegde";
$password = "ewtrrgtg"; 
$database = "ashegde";
$hostname = "vesta.uclan.ac.uk";
/*$connection is a varable which connects the website to the server and dattabase.*/
$connection = mysqli_connect($hostname, $username, $password, $database); 
if (empty($_POST))
{
?>
<!--code is referenced from W3Schools-->
<div class ="login-form">
<form action="login.php" method="post">
<label for="un"> <b>Username</b> </label>
<input type="text" id="username" placeholder="Enter Username" name="username" required/><!--placeholder allows for text being displayed inside the box, input type allows the user to input text in the box.-->

<label for="psw"> <b>Password</b> </label>
<input type="password" id="password" placeholder="Enter Password" name="password" required/>

<button type="submit"> Login </button>

<div class ="login-form">
<button type ="button" class ="cancel-button"> Cancel </button>

<label>
<input type ="checkbox" name ="remember" checked ="checked"> Please remember me
</label>

</div>
</form>
</div>

<?php 
}

else
{  
$username = $_POST["username"];/*$_POST is used to collect values in a form, this is called post method. The information sent in the post method can not be viewed by others.In addition, there are no limits on the information being received and sent.*/
$password = $_POST["password"];
$sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";/*This is an sql statement which defines the variable used for the login, only the username and password given in the database is accepted unless an insert option is given to add other username and password.*/
$result = mysqli_query($connection, $sql); 
  
if (mysqli_num_rows($result) == 1) /*The if statement compares the data typed in to the data from the database, this ensures there are condition if the data entered is wrong or right.*/
{
$_SESSION['login'] = true; /*Only the username and password given in the database is accepted*/
$_SESSION['username'] = $username;
header( 'Location: menu.php');/*After logging in successfully the user is taken to the menu.*/
}

else
{ 
echo "The database is connected to php and mysql, but the user entered the wrong login details."; /*If the user types in the wrong password than an wrror message pop out*/
}

mysqli_close($connection);/*This code stops the connection of the website to the database.*/
   
} 

?>
</body>
</html>