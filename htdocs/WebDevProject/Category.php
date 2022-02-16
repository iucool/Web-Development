<!DOCTYPE HTML>

<html>
<head>

    <title>
        Phoenix Library Category Page
    </title>
    <link rel="stylesheet" type="text/css" href="">

</head>

<body>

<div div class="header">
		<div class="container">
	
			<div id="menu">
			<ul class="nav">
				<li><a href="Home.php">Home</a></li>
				<li><a href="Searching.php">Search</a></li>
				<li><a href="books.php">Show/Reserve books</a></li>
				<li><a href="Register.php">Register</a></li>
				<li><a href="Login.php">Login</a></li>
				<li><a href="Category.php">Category</a></li>
				<li><a href="Searching.php">Search</a></li>
			</ul>
			</div>
		</div>
	</div>

    <div id="user_login">
        <div id="style_div">

            <form method="POST">

                <p><label for="categoryID">Enter category ID: </label></p>
                    <input type="text" name="categoryID" size="25" required/> 

                <p><label for="categoryType">Enter category Type: </label></p>
                    <input type="text" name="categoryType" size="25" required/>

                <p><input type="submit" value="Submit Category Details"/></p>

            </form>

            <a href="home.php"> Return to homepage </a> <br><br>
        </div>

    </div>
</body>

</html>

<?php

    require_once "database.php";

    if (isset($_POST['categoryID']) && isset($_POST['CategoryType']) )
    {

        $ci = $_POST['categoryID'];
        $cd = $_POST['categoryType'];

        $sql_insert = "INSERT INTO category (CategoryID, CategoryType)
        VALUES  ('$ci', '$cd')";

        if($conn->query($sql_insert) === TRUE) {
            echo "Category Registration Successful";
        } else {
            echo "Category Registration Unsuccessful: " . $sql_insert . "<br>" . $conn->error;
        }

    $conn->close();

}
?>