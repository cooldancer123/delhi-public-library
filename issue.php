<html>
<link rel="stylesheet" href="styling2.css">
<body>
<p id="demo"></p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="test";
$bid=$_POST['bid'];
$rname=$_POST['rname'];
$date=date("Y-m-d");
$due=strtotime("+15 days");
$date2=date("Y-m-d",$due);

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO reader(bid,rname,issue_date,due_date)
VALUES ('$bid','$rname','$date','$date2')";

$sql2="select id from book where id='$bid' and Stock>0";
$sql3="update book set stock = stock - 1 where id='$bid'";

$result = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result)<=0)
{
	echo '<script>';
	echo 'alert("No books to issue");';
	echo 'window.location="2 - 2.html";';
	echo '</script>';
	//echo "No books to issue";
	return;
}
if (mysqli_query($conn, $sql) && mysqli_query($conn,$sql3)) 
{     
	echo '<script>';
	echo 'alert("Your book has been issued for 15 days");';
	echo 'window.location="2 - Reader.html";';
	echo '</script>';
    //echo "New record created successfully";
    //header("location:2 - Reader.html");
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
</body>
</html>