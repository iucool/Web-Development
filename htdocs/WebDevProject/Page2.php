<?php 

session_start(); 

require_once "database.php";

unset($_SESSION["username"]);

// START IF_POST
if (isset($_POST['username']) && isset($_POST['password'])) {

    // Declare and assign variables grabbed from user
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    // Query to get all users and passwords that correspond to user input
    $sql = "SELECT * FROM lab WHERE Username='$uname' AND Password='$pass'";
    $check_result = mysqli_query($conn, $sql);

    // If there is a result (user is registered)
    if (mysqli_num_rows($check_result) === 1) {

        $row = mysqli_fetch_assoc($check_result);

        echo '<script>alert("Logged in!")</script>';

        // Assign current username for session until destroyed (logged out)
        $_SESSION['username'] = $row['Username'];

        header("Location: Page1.php");
    } // end if

    // If there are no results (user is not registered)
    else {

        echo '<script>alert("Incorrect login details!")</script>';

    } // end else

} // END IF_POST
?>

<html>
        <head>
                <title>Login</title>
        </head>

        <body style="font-family: sans-serif;">
                <h1>Please Log In</hl>

                <?php
                /*
                        if ( isset ($_SESSION["error"]))
                        {
                                echo ('<p ="color:red">Error:' . $_SESSION["error"]."</p>\n");

                                unset($_SESSION["error"]);
                        }
                */
                ?>

                <form method="post">

                        <p>Account: <input type="text" name="username" value="" required/></p>
                        <p>Password: <input type="password" name="password" value="" required/></p>
                        <p><input type="submit" value="Log In"></p>

                </form>
        </body> 
</html>