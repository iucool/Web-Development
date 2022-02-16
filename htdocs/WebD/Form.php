<!DOCTYPE html >
    <head>
        <?php
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbname = "labdb";

        $conn = new mysqli($serverName, $userName, $password, $dbname);

        if ($conn ->connect_error)
        {
            die("Connect failed: " . $conn ->connect_error);

        }

        //echo "Connected Successfully";

        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);

        if ($result != false && $result-> num_rows > 0) 
        {
            echo "<table border = '4'>";
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>";
                echo $row["ProductID"];
                echo "</td><td>";
                echo $row["PName"];
                echo "</td><td>";
                echo $row["Description"];
                echo "</td><td>";
                echo $row["Price"];
                echo "</td><td>";
                echo $row["Stock"];
                echo "</td></td>";
            }
        }

        else
        {
            echo "0 Results";
        }

    require_once "Form.php";
    if ( isset($_POST['UserName']) && isset($_POST['Password']) && isset($_POST['FirstName']) && isset($_POST['LastName'])) {
    $un = $_POST['UserName'];
    $p = $_POST['Password'];
    $fn = $_POST['FirstName'];
    $ln = $_POST['LastName'];

    $sql = "INSERT INTO user (UserName, Password, FirstName, LastName) VALUES ('$un', '$p', '$fn', '$ln')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


        <form method="post">
            <p>Username: 
                <input type="text" name="UserName"/>
            </p>
            <p>Password: 
                <input type="password" name="Password"/>
            </p>
            <p>First Name: 
                <input type="text" name="FirstName"/>
            </p>
            <p>Last Name: 
                <input type="text" name="LastName"/>
            </p>
            <p>
                <input type="submit" value="Add New"/>
            </p>
        </form>
    </body>
</html>