<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "labdb";

//Create connection
$conn = new mysqli($servername,$username,$password, $dbname);

//Check connection
if ($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
} else {
    echo "===== Connected Successfully ======<br><br>";
}

if ( isset ($_POST['delete']) && isset ($_POST['ProductID']) ) {
$id = $conn -> real_escape_string ($_POST ['ProductID']);
$sql =  "DELETE FROM product WHERE ProductID = $id";
echo "<pre>\n$sql\n</pre>\n";

$conn->query ($sql);

echo 'Success - <a href="index.php">Continue...</a>';
return;
}
$id = $conn -> real_escape_string ($_GET['ProductID']);
$sql = "SELECT PName, ProductID FROM product WHERE ProductID='$id'";
$result = $conn->query ($sql);
$row = $result->fetch_assoc ();

echo "<p>Confirm: Deleting ". $row["PName"] ."</p>\n";
echo ('<form method="post"><input type="hidden" ');
echo ('name="ProductID" value="'.htmlentities ($row["ProductID"]).'">'."\n");
echo ('<input type="submit" value="Delete" name="delete">');
echo ( '<a href="index.php">Cancel</a>');
echo ("\n</form>\n") ;
?>