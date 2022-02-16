<html>
  
    <head>
        <title>Update</title>
    </head>
  
    <body>
        <h1>Update Product</h1>
        <?php
            echo ' <a href="index.php">Back to Index</a> <br>' ;
            require_once "database.php";
            if ( isset($_POST['pname']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['id'])) {
                $n = $conn -> real_escape_string ($_POST['pname']);
                $d = $conn -> real_escape_string ($_POST['description']);
                $p = $conn -> real_escape_string ($_POST['price']);
                $s = $conn -> real_escape_string ($_POST['stock']);
                $id = $conn -> real_escape_string ($_POST['id']);
                $sql = "UPDATE product SET PName='$n', Description='$d', Price='$p', Stock='$s' WHERE ProductID='$id'";
                echo "<pre>\n$sql\n</pre>\n";
                $conn->query($sql);
                echo 'Updated';
                return;
            }
            $id = $conn -> real_escape_string($_GET['id']);
            $sql = "SELECT PName, Description, Price, Stock, ProductID FROM product WHERE ProductID='$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $n = htmlentities($row["PName"]);
            $d = htmlentities($row["Description"]);
            $p = htmlentities($row["Price"]);
            $s = htmlentities($row["Stock"]);
            $id = htmlentities($row["ProductID"]);
            
            echo <<< _END
            <p>Edit Product</p>
            <form method="post">
            <p>Product Name:<input type="text" name="pname" value="$n"></p>
            <p>Product Description:<input type="text" name="description" value="$d"></p>
            <p>Product Price:<input type="float" name="price" value="$p"></p>
            <p>Product Stock:<input type="number" name="stock" value="$s"></p>
            <input type="hidden" name="id" value="$id">
            <p><input type="submit" value="Update"></p>
            </form>
            _END
        ?>

    </body>

</html>