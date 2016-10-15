<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="test";
$bid=$_POST['bid'];
$rname=$_POST['rname'];
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "delete from reader where bid='$bid' and rname='$rname'";
$sql2="select id from book where id='$bid'";

$sql3="update book set stock = stock + 1 where id='$bid'";
$sql4="select bid,rname from reader where bid='$bid' and rname='$rname'";
$result = mysqli_query($conn, $sql2);
$result1=mysqli_query($conn,$sql4);
if ((mysqli_num_rows($result)==0)||(mysqli_num_rows($result1)==0))
{
	echo '<script>';
	echo 'alert("No books to return");';
	echo 'window.location="2 - 3.html";';
	echo '</script>';
	return;
}
if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sql3)) {
    echo '<script>';
    echo 'alert("Book Returned successfully");';
    //header("location:2 - Reader.html");
	echo 'window.location="2 - Reader.html";';
	echo '</script>';
    
} 

mysqli_close($conn);

?>