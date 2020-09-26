<?php session_start();?>
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

if($_SESSION['login'] == null)
{
	header('location:login.php');
}
else
{
	echo"Tracks currently on display"; /*echo allows the system to display the data written in php or saved in a database or the server*/
	
	/*$username,$password,$database,$hostname are variables. This variables are required as it defines the database, host and and server being used which will allow us to connect to the database and server. This variables are important in order to take and display the information on the website. In addition this is the first step in order for the login page to work.*/
	$hostname = "vesta.uclan.ac.uk";
    $username = "ashegde";
    $password = "ewtrrgtg";
    $database = "ashegde";
	/*$connection is a varable which connects the website to the server and dattabase.*/
	$connection = mysqli_connect("$hostname", "$username", "$password", "$database");
	if(empty($_GET)|| $_GET["genre"] == "General")
	{
	$sql ="SELECT * FROM tracks";
	}
	
	else
{
	$genre = $_GET["genre"];
	$sql ="SELECT * FROM tracks WHERE genre = '$genre'";
}
$result= mysqli_query($connection, $sql);

if(mysqli_num_rows($result) > 0)
{
	while($row=mysqli_fetch_array($result))/*$row is a variable, this allows the system to return a value from mysqli_fetch_array($result))which is a function, as a result allows the system to return the array. The $row is used as an array and the contents in the[]will be defined according to the row in a table from the selected database.*/
	{
	?>	
	<!--code is referenced from W3Schools-->
	<!--eduonix had an example of a table being used along side a php code, this example was used as referance.-->
<table>
	<tr>
	<th>track id</th>
	<th>artist</th>
	<th>album</th>
	<th>description</th>
	<th>name</th>
	<th>genre</th>
	<th>image</th>
	<th>audio</th>
	</tr>
	
	<tr>
	<td><?php echo $row['track_id'];?></td>
	<td><?php echo $row['artist'];?></td>
	<td><?php echo $row['album'];?></td>
	<td><?php echo $row['description'];?></td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['genre'];?></td>
	<td><?php echo "<img src=\"". $row["thumb"]."\" alt=\"\"/>";?></td>
	<td><?php echo '<audio controls> <source src="'.$row["sample"].'" type="audio/mpeg"> </audio>';?></td><!--accesses the audio file and images in the database, in addition the user can download the audio file.-->
	</tr>
</table>
	
	<?php
	}

}
	else
	{
		echo "0 results"; /*Ends the loop*/
	}
	mysqli_close($connection);/*This code stops the connection of the website to the database.*/
   
} 
?>

</body>
</html>