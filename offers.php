<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet.css" /> <!--The php file is linked with the css, which allows for the design and layout aspect of the website.-->
<title>WaveLength</title>
</head>

<body>
<h1>WaveLength</h1> <!-- Name of website, acts as the logo.-->

<!--The php file is saved in the server by using FileZilla, so the user can access other pages by clicking the link of their choice.-->
<ul>
<li><a href="menu.php">Main Menu</a></li>
<li><a href="offers.php">Special Offers</a></li>
<li><a href="music.php">Music</a></li>
<li><a href="login.php">Logout</a></li>
<input type="text" name="search" placeholder="Search Me.."><!--placeholder allows for text being displayed inside the box, input type allows the user to input text only to search for the desired information.-->
</ul>

<?php
/*$connection is a varable which connects the website to the server and dattabase.*/
   $connection = mysqli_connect("vesta.uclan.ac.uk", "ashegde", "ewtrrgtg", "ashegde");
   $result = mysqli_query($connection, "SELECT * FROM offers");
   while($row=mysqli_fetch_array($result))/*$row is a variable, this allows the system to return a value from mysqli_fetch_array($result))which is a function, as a result allows the system to return the array. The $row is used as an array and the contents in the[]will be defined according to the row in a table from the selected database.*/
   {
?>
<table>
	
	<tr>
	<th><?php echo $row['offer_id'];?></th><!--echo allows the system to display the data written in php or saved in a database or the server-->
	<th><?php echo $row['title'];?></th>
	<th><?php echo $row['description'];?></th>
	<th><?php echo $row['price'];?></th>
	<?php echo "<img src=\"". $row["image"]."\" alt=\"\"/>";};?><!--accesses the images from the database, this images are saved in the server.-->
	</tr>
	
</table>

</body>
</html>