<html>
    <head>
        <title>Address Book Example</title>
    </head>

    <body style="font-family: sans-serif;">

    <hl>Online Address Book</hl>

    <?php

    include "database.php";

    session_start();

    if ( isset($_POST["street"]) && isset($_POST["city"]) &&
    isset($_POST["state"]) && isset($_POST["zip"]) ) {

        $_SESSION['street'] = $_POST['street'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['zip'] = $_POST['zip'];

        header( 'Location: Page1.php' ) ;

        return;

    } else if ( count($_POST) > 0 ) {

        $_SESSION["error"] = "Missing Required Information";

        header( 'Location: Page1.php' ) ;

        return;
    }

    if (!isset($_SESSION["username"])) { ?>
    Please <a href="Page2.php">Log In</a> to start.
        <?php 
        } 
        else 
        {
            //include "connDB.php";

            // Retrieve data from the session for the view
            $uname = isset($_SESSION['username']) ? $_SESSION['username'] : '';
            $street = isset($_SESSION['street']) ? $_SESSION['street'] : '';
            $city = isset($_SESSION['city']) ? $_SESSION['city'] : '';
            $state = isset($_SESSION['state']) ? $_SESSION['state']: '';
            $zip = isset($_SESSION['zip']) ? $_SESSION['zip'] : '';

            $sql = "UPDATE lab SET Street='$street', City='$city', State='$state',
                Zip='$zip' WHERE Username='$uname'";

            $conn->query($sql); 

            ?>

            <p>Please enter your address:

            <form method="post">
                <p>Street: <input type="text" name="street" size="50"
                value="<?php echo(htmlentities($street)); ?> "></p>

                <p>City: <input type="text" name="city" size="20"
                value="<?php echo(htmlentities($city)); ?>
                "></p>

                <p>State: <input type="text" name="state" size="2"
                value="<?php echo(htmlentities($state)); ?> ">
                Zip: <input type="text" name="zip" size="5"
                value="<?php echo(htmlentities($zip)); ?> "></p>

                <p><input type="submit" value="Update">

                <input type="button" value="Logout"
                onclick="location.href='page3.php'; return false "></p>

                </form>

        <?php } ?>

    </body> 
</html>