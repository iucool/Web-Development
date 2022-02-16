<?php
    require_once "Database.php";

    // DROP TABLE
    $sql = "DROP TABLE lab";

    if($conn->query($sql) === TRUE) {
        echo "Drop accounts table Successfully" . "<br>";
        } else {
            echo "Drop accounts table Unsuccessful: " . $sql . "<br>" . $conn->error . "<br>";
        }


    /* START OF CREATE TABLES */
    // ACCOUNTS
    $sql = "CREATE TABLE lab (
        Username VARCHAR(50),
        Password VARCHAR(50),
        Street VARCHAR(50),
        City VARCHAR(50),
        State VARCHAR(50),
        Zip VARCHAR(50),

        PRIMARY KEY (Username)
    )";

    if($conn->query($sql) === TRUE) {
    echo "Create accounts table Successfully" . "<br>";
    } else {
        echo "Create accounts table Unsuccessful: " . $sql . "<br>" . $conn->error . "<br>";
    }
    /* END OF CREATE TABLES */


    /* START OF INSERT VALUES */
    // USERS
    $sql_insert = "INSERT INTO lab (Username, Password, Street, City, State, Zip)
        VALUES  ('alanjmckenna', 't1234s', '38 Cranley Road', 'Blackrock', 'Dublin', 'A94RH78'), 
                ('joecrotty', 'kj7899', 'Apt 5 Clyde Road', 'Dun Laoghaire', 'Dublin', 'A94RH33'),
                ('tommy100', '123456', '14 hyde road', 'Tallaght', 'Dublin', 'A93RK88'),
                ('Phoenix', '123', 'For testing purposes only', 'Finglas', 'Dublin', 'A29663')";

    if($conn->query($sql_insert) === TRUE) {
        echo "Account input Successfully" . "<br>";
    } else {
        echo "Account input Unsuccessful: " . $sql_insert . "<br>" . $conn->error . "<br>";
    }
    $conn->close();
    /* END OF INSERT VALUES */

?>

<!DOCTYPE HTML>
<html>

    <head>
        <title>Query page</title>
    </head>

    <body>
    </body>
</html>