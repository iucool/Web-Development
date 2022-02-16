<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	    <!--Linking to CSS-->
		<link type="text/css" rel="stylesheet" href="Main-Style.css"/>
		<title>Reservation</title>
	</head>
	
<body>
	<div div class="header">
		<div class="container">
	
	<!--Creating the Navigator-->
			<div id="menu">
			<ul class="nav">
				<li><a href="Home.php">Welcome</a></li>
				<li><a href="Searching.php">Search</a></li>
				<li><a href="Reservation.php">Reserve</a></li>
				<li><a href="Register.php">Register</a></li>
				<li><a href="Login.php">Logout</a></li>
				<li><a href="Unreserve.php">Unreserve a book</a></li>
			</ul>
			</div>
		</div>
	</div>
	
	<div class="backgroundfixReserve">
		<div class="container">  
			<div class="main">
				<h1>Reserve a Book</h1>
				<p class="btn-primary">The place where to reserve the book you want.</p>
			</div>
		</div>
	</div>
	
	<?php
                include_once "database.php";

                $sql = "SELECT * FROM `books` WHERE Reserved = 'N'";
            
                $result = $conn->query($sql);

                // If there is more than 0 rows
                if ($result->num_rows > 0) {

                    echo <<< _END
                        <table border="2">
                        <tr>
                            <th>ISBN</th>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Year</th>
                            <th>Category ID</th>
                        </tr>
                    
                        _END;

                    // output data of each row in a table  
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr><td>";
                        echo (htmlentities ($row["ISBN"])); 
                        
                        echo ( "</td><td>");
                        echo (htmlentities ($row["BookTitle"])); 

                        echo ("</td><td>");
                        echo (htmlentities ($row["Author"])); 
                        
                        echo ( "</td><td>\n");
                        echo (htmlentities ($row["Edition"])); 
                        
                        echo ( "</td><td>\n");
                        echo (htmlentities ($row["Year"])); 

                        echo ( "</td><td>\n");
                        echo (htmlentities ($row["CategoryID"])); 

                        
                            echo ( "</td><td>\n");
                            echo (htmlentities ($row["Reserved"])); 
                        
                        
                        

                        
                       

                        
                    } // end while
                    
                    echo "</table>";

                } else {
                    echo "There are no available books to reserve" . "<br>" . "<br>";
                }

                $conn->close();
            ?>
	
	<div class="Form2">
	<h1 class="loginheader">Reserve A Book</h1>
		<form action="Reservation.php" method="POST">
		  ISBN Of The Book:<br>
	 	 <input type="text" name="ISBN" required><br>
	  
	 	 <input type="submit" value="Submit">
		</form>
	</div>
	
	<br><br>
					
    <!-- Start of footer -->
	<div class="clearfix"></div>
	<div  class="footer">
		<div class="container">

		</div>
	</div>
	
</body>
</html>