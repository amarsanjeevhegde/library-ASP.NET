<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet.css" /> <!--The php file is linked with the css, which allows for the design and layout aspect of the website.-->
<title>WaveLength</title>
</head>

<body>
<h1>WaveLength</h1> <!-- Name of website, acts as the logo.-->

<?php

/*$username,$password,$database,$hostname are variables. This variables are required as it defines the database, host and and server being used which will allow us to connect to the database and server. This variables are important in order to take and display the information on the website. In addition this is the first step in order for the login page to work.*/
$hostname = "vesta.uclan.ac.uk";
$username = "ashegde";
$password = "ewtrrgtg";
$database = "ashegde";
$connection = mysqli_connect("$hostname", "$username", "$password", "$database");

?>

<!--The php file is saved in the server by using FileZilla, so the user can access other pages by clicking the link of their choice.-->
<ul>
<li><a href="menu.php">Main Menu</a></li>
<li><a href="offers.php">Special Offers</a></li>
<li><a href="music.php">Music</a></li>
<li><a href="login.php">Logout</a></li>
<input type="text" name="search" placeholder="Search Me.."><!--placeholder allows for text being displayed inside the box, input type allows the user to input text only to search for the desired information.-->
</ul>

<p>Welcome to WaveLength!!! were everything is hippity hoppity and groovy. We have everything from the modern raps to the classics, with various genre. Excitable and affordable offers are available, so please have a good and pleasant time while visiting our website. Be sure to look over the offers, currently the family-pack is in discount so please consider buying the pack as the discount is up until 16th January. New music genre were added for all the music enthusiasts pleasure, such as Indie and Metal.</p>

<?php
/*$connection is a varable which connects the website to the server and dattabase.*/
   $connection = mysqli_connect("vesta.uclan.ac.uk", "ashegde", "ewtrrgtg", "ashegde");
   $result = mysqli_query($connection, "SELECT * FROM reviews");
   while($row=mysqli_fetch_array($result))
   {
 
?>

<h2>Reviews</h2>
	<p>review id- <?php echo $row['review_id'];?></p><!--echo allows the system to display the data written in php or saved in a database or the server.-->
	<p>product id- <?php echo $row['product_id'];?></p>  <!--$row is a variable, this allows the system to return a value from mysqli_fetch_array($result))which is a function, as a result allows the system to return the array. The $row is used as an array and the contents in the[]will be defined according to the row in a table from the selected database.-->
	<p>name- <?php echo $row['name'];?></p>
	<p>review- <?php echo $row['review'];?></p>
    <p>rating- <?php echo $row['rating'];}?></p>

</body>
</html>