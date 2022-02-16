<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Welcome to Phoenix Library</title>



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

<div class="signup-form">
    <form action="home.php" method="post" enctype="multipart/form-data">
		<h2>Welcome</h2>
        <br>
		
            <?php
				session_start();
				include 'database.php';
				$UserName= $_SESSION["UserName"];
				$sql=mysqli_query($conn,"SELECT * FROM librarymember where UserName='$UserName'");
				$row  = mysqli_fetch_array($sql);
            ?>
			<br>

		<p class="hint-text"><br><b>Welcome </b><?php echo $_SESSION["FirstName"] ?> <?php echo $_SESSION["SurName"] ?></p>
        <div class="text-center">Want to Leave the Page? <br><a href="logout.php">Logout</a></div>
    </form>
	
</div>
</body>
</html>