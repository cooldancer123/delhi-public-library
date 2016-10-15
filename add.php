<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="test";
$bid=$_POST['bid'];
$bname=$_POST['bname'];
$author=$_POST['author'];
$language=$_POST['language'];
$stock=$_POST['stock'];

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO book(id,name,author,stock,language)
VALUES ('$bid','$bname','$author','$stock','$language')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: 2 - Librarian.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>