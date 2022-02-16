<!DOCTYPE html>

<html>
<head>
  <title>Display all products from Database</title>
</head>
<body>

<h2>Product Details</h2>

    <table border="2">
    <tr>
        <td>Name</td>
        <td>Descc</td>
        <td>Price</td>
        <td>Stock</td>
    </tr>

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

    $sql = "SELECT * FROM product;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?php echo $row['PName']; ?></td>
        <td><?php echo $row['Description']; ?></td>
        <td><?php echo $row['Price']; ?></td>    
        <td><?php echo $row['Stock']; ?></td>    
        <td><a href="update.php?ProductID=<?php echo $row['ProductID']; ?>">Edit</a></td>
        <td><a href="delete.php?ProductID=<?php echo $row['ProductID']; ?>">Delete</a></td>
    </tr>    
    <?php
    }
}
    ?>
</table>
<br>
<!-- <a href="sql.php">Back</a> -->
<a href="add.php"> Add new</a> 
</body>
</html>