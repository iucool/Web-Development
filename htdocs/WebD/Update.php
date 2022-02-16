<head>

    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <title></title>

</head>

<body>
    
<?php
            require_once "index.php";
            echo ' <a href="index.php">Back to index</a> <br>' ; 

            $sql = "SELECT ProductID, PName, Description, Price, Stock FROM product";
            $result = $conn->query($sql);
            if ($result -> num_rows > 0) {
                echo "<table border ='1'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>";
                    echo(htmlentities($row["PName"]));
                    echo("</td><td>");
                    echo(htmlentities($row["Description"]));
                    echo("</td><td>");
                    echo(htmlentities($row["Price"]));
                    echo("</td><td>");
                    echo(htmlentities($row["Stock"]));
                    echo("</td><td>\n");
                    echo('<a href="update2.php?id='.htmlentities($row["ProductID"]).'">Update</a>');
            } }else {
                echo "0 results";
            }
            $conn->close(); 

        ?>
 

</body>

</html>