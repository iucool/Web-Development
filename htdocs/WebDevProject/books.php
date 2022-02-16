<!DOCTYPE html>
<html>

    <head>
        <title>Available Books</title>
        <meta charset="utf-8">
    </head>

    <body>

    <div div class="header">
		<div class="container">
	
			<div id="menu">
			<ul class="nav">
				<li><a href="Home.php">Home</a></li>
				<li><a href="books.php">Show/Reserve books</a></li>
				<li><a href="Register.php">Register</a></li>
				<li><a href="Login.php">Login</a></li>
				<li><a href="Category.php">Category</a></li>
				<li><a href="Searching.php">Search</a></li>
			</ul>
			</div>
		</div>
	</div>

        <h2> Books </h2>

            <?php
                include_once "database.php";

                $sql = "SELECT * FROM `books` WHERE Reserved = 'N'";
            
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo <<< _END
                        <table border="2">
                        <tr>
                            <th>ISBN</th>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Year</th>
                            <th>CategoryID</th>
                        </tr>
                    
                        _END;

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
                        
                        echo ('<a href="ReserveBook.php?ISBN='.htmlentities ($row["ISBN"]).'">Reserve book</a>');
                        
                        echo ("</td></tr>\n");

                        
                    } 
                    
                    echo "</table>";

                } else {
                    echo "There are no available books to reserve" . "<br>" . "<br>";
                }

                $conn->close();
            ?>

        <a href="Home.php">Go Back</a>

    </body>
</html>