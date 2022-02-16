<html>
<body>

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

/* --------------------------*/

$sql = "SELECT * FROM product";

$result = $conn->query($sql);

if (isset($_POST['pname']) && isset($_POST['desc']) && isset($_POST['price']) && isset($_POST['stock'])) {
            $prod_name = $_POST['pname'];
            $p_descript = $_POST['desc'];
            $p_price = $_POST['price'];
            $p_stock = $_POST['stock'];

            $sql_insert = "INSERT INTO product (PName, Description, Price, Stock) VALUES  ('$prod_name', '$p_descript', '$p_price', '$p_stock')";

            if($conn->query($sql_insert) === TRUE)
            {
                echo "===== Successfully added New Product =====";
            }
            else
            {
                echo "===== Error: " . $sql_insert . " =====<br>" . $conn->error;
            }

        $conn->close(); }

// Check if ID exists
//$id_exist = false;
//$url_id = mysql_real_escape_string($_GET['ProductID']);
//$sql = "SELECT ProductID FROM product WHERE ProductID='$url_id'";
//$result = mysql_query($sql);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>

<!-- Start of Form -->

<p> Add a New Product </p>

<form method="post">

<p>Product Name:
<input type="text" name="pname" id="pname"></p>

<p>Description:
<input type="text" name="desc" id="desc"></p>

<p>Price:
<input type="text" name="price" id="price"></p>

<p>Stock:
<input type="text" name="stock" id="stock"></p>

<p><input type="submit" value="Add New"/></p>
</form>

<!-- End of Form! -->

<a href="index.php"> Go Back to Home </a>
</body>
</html>
