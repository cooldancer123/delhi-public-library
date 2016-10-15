<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$bname=$_POST['bname'];
$author=$_POST['author'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM book WHERE Name='$bname' and Author='$author'";
$sql1="select Name,Author from book where Name='$bname' and Author='$author'";
$result=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)==1&&(mysqli_query($conn,$sql))) {
	
	echo '<script>';
	echo 'alert("Record deleted successfully");';
	echo 'window.location="2 - Librarian.html";';
	echo '</script>';

} else {
	echo '<script>';
	echo 'alert("Error deleting record");';
	echo 'window.location="delete(librarian).html";';
	echo '</script>';
	
}

mysqli_close($conn);
?>