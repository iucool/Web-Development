<html>
</html>
<head>
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
</body>


<?php
    session_start();

    include "database.php";

    $uname = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';


    if (isset($_POST['ISBN']) && isset($_POST['BookTitle']) && isset($_POST['Author']) 
    && isset($_POST['Year']) && isset($_POST['Edition']) && isset($_POST['CategoryID'])
    && isset($_POST['Reserved'])) {

        $isbn = $conn -> real_escape_string ($_POST['ISBN']);
        $b = $conn -> real_escape_string ($_POST['BookTitle']);
        $a = $conn -> real_escape_string ($_POST['Author']);
        $e = $conn -> real_escape_string ($_POST['Edition']);
        $y = $conn -> real_escape_string ($_POST['Year']);
        $c = $conn -> real_escape_string ($_POST['CategoryID']);
        $r = $conn -> real_escape_string ($_POST['Reserved']);

        $sql = "UPDATE books SET ISBN='$isbn', BookTitle='$b', 
                Author='$a', Edition='$e', Year='$y', CategoryID='$c',
                Reserved='Y' WHERE ISBN='$isbn'";
        
        $conn->query($sql);

        $sql = "INSERT INTO reservedbook (ISBN, Username, ReservedDate)
                    VALUES ('$isbn', '$uname', NOW())";
        
        $conn->query($sql);

        echo 'Successfully reserved book' . '<br>' . '<a href="home.php">Return to homepage...</a>';
        return;

    } 


    $isbn = $conn -> real_escape_string($_GET["ISBN"]);
    
    $sql = "SELECT ISBN, BookTitle, Author, Year, Edition, CategoryID, Reserved FROM books WHERE ISBN='$isbn'";
    
    $result = $conn->query($sql);
    
    $row = $result->fetch_assoc();

    $isbn = htmlentities($row["ISBN"]);
    $b = htmlentities($row["BookTitle"]);
    $a = htmlentities($row["Author"]);
    $y = htmlentities($row["Year"]);
    $e = htmlentities($row["Edition"]);
    $c = htmlentities($row["CategoryID"]);
    $r = htmlentities($row["Reserved"]);
    
    echo <<< _END
            <form method="post">

                <input type="hidden" name="ISBN" value="$isbn">

                <input type="hidden" name="BookTitle" value="$b">

                <input type="hidden" name="Author" value="$a">

                <input type="hidden" name="Year" value="$y">

                <input type="hidden" name="Edition" value="$e">

                <input type="hidden" name="CategoryID" value="$c">

                <input type="hidden" name="Reserved" value="Y">

                <p><input type="submit" value="Confirm reservation"/> <br>
                <a href="home.php">Cancel reservation</a></p>

            </form>
            _END
?>