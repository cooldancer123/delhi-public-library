<html>
<link rel="stylesheet" href="styling2.css">
<body>
	<h3>Results</h3>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$bname=$_POST['bname'];
$author=$_POST['author'];
$language=$_POST['language'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id,name,author,language,stock FROM book where name='$bname' and author='$author' and language='$language'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. "author " . $row["author"]. "language: ". $row["language"]. "stock: ". $row["stock"]. "price: ". $row["price"]."<br>";
		echo "Book ID: ".$row["id"]."<br>"." Name: ".$row["name"]."<br>"." Author: ".$row["author"]."<br>"." Language: ".$row["language"]."<br>"." Stock: ".$row["stock"]."<br>";
	}
}
	else {
		echo '<script>';
	    echo 'alert("0 results");';
		echo 'window.location="search(librarian).html";';
		echo '</script>';
}
mysqli_close($conn);
?>
<br>
<br>
<table align="center">
<tr>
<td><a href="2 - Librarian.html"><input type="submit" value="OK"></a></td>
</tr>
</table>
</body>
</html>