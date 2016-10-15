<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="test";
$uname=$_POST['username'];
$pass=$_POST['password'];
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "select username,password from librarian where username='$uname' and password='$pass'";
$result = mysqli_query($conn, $sql);
//if (mysqli_query($conn, $sql)) {
	if (mysqli_num_rows($result)==1){
        echo "Login successful";
        header("location:2 - Librarian.html");
    }
else {
    echo '<script>';
    echo 'alert("Invalid username or password");';
	echo 'window.location="login.html";';
	echo '</script>';
}

mysqli_close($conn);

?>