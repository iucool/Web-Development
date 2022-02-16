<!DOCTYPE html>
<head>
</head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Labdb";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";
?>
</body>
</html>
