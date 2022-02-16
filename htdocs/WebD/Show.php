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

$sql = "SELECT * FROM `product`";

$result = $conn->query($sql);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>

    <h2> ===== PRODUCTS ===== </h2>
    
    <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>PName</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            
            <tbody>
                <!-- Loop Start -->
                <?php 
                    if($result->num_rows > 0) 
                    {
                        while($row = $result->fetch_assoc())
                        {
                ?>
                <tr>
                    <td>
                        <?php echo $row["ProductID"]; ?>
                    </td>
                    <td>
                        <?php echo $row["PName"]; ?>
                    </td>
                    <td>
                        <?php echo $row["Description"]; ?>
                    </td>
                    <td>
                        <?php echo $row["Price"]; ?>
                    </td>
                    <td>
                        <?php echo $row["Stock"]; ?>
                    </td>
                </tr>
                <?php 
                        } 
                    }
                    else
                    {
                        echo "0 results";
                    }
                ?>
                <!-- Loop End -->
            </tbody>
        </table>

<a href="index.php"> Go Back to Home </a>

</body>
</html>