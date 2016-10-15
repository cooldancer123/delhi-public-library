<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="test";
$lname=$_POST['lname'];
$uname=$_POST['username'];
$pass=$_POST['password'];
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO librarian(lname,username,password)
VALUES ('$lname','$uname','$pass')";
$sql1="select username from librarian where username='$uname'";
$result=mysqli_query($conn,$sql1);
if ((mysqli_num_rows($result)==0)&&(mysqli_query($conn,$sql))) {
		echo '<script>';
    echo 'alert("Sign up successful");';
	echo 'window.location="option.html";';
	echo '</script>';
    
} else {
	echo '<script>';
    echo 'alert("Username already exists");';
	echo 'window.location="signup.html";';
	echo '</script>';
}
mysqli_close($conn);

?>