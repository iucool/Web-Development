<!DOCTYPE html >
    <head>
        
    </head>

    <?php 

    include("database.php"); 

    ?>

    <body>
    <div div class="header">
		<div class="container">
	
	<!--Creating the Navigator-->
			<div id="menu">
			<ul class="nav">
				<li><a href="Home.php">Welcome</a></li>
				<li><a href="Searching.php">Search</a></li>
				<li><a href="Reservebook.php">Reserve a book</a></li>
				<li><a href="Register.php">Register</a></li>
				<li><a href="Login.php">Logout</a></li>
                <li><a href="Unreserve.php">Unreserve a book</a></li>
			</ul>
			</div>
		</div>
	</div>

        <h3> Enter which book or Author you would like to find below </h3>
        <p> **Book title and Author of book will appear after the search** </p>
        <form action="" method="post">
            <input type="text" placeholder="Search" name="search">
            <button type="submit" name="submit">Search</button>
        </form>
        <br>
        <h3> Reserve Book </h3>

            <h2> ===== Books ===== </h2>
            
            <table>
                    <thead>
                        <tr>
                            <th>BookTitle</th>
                            <th>Author</th>
                            <th>Edition</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <!-- Loop Start -->
                        <?php 
                        $searchValue = $_POST['search'];
                        
                        $sql = "SELECT * FROM books WHERE BookTitle LIKE '%$searchValue%' OR Author LIKE '%$searchValue%'";

                        $result = $conn->query($sql);

                            if($result->num_rows > 0) 
                            {
                                while($row = $result->fetch_assoc())
                                {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row["BookTitle"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Author"]; ?>
                            </td>
                            <td>
                                <?php echo $row["Edition"]; ?>
                            </td>
                            <td>
                                <a href="reservation.php">Reserve</a>
                            </td>
                        </tr>
                        <?php 
                                } 
                            }
                            else
                            {
                                echo "0 results";
                            }
                        ?>
                        <!-- Loop End -->
                    </tbody>
                </table>

        <br>

    </body>


    <footer>
        <a href="Home.php"> Go Back to Home </a>
    </footer>

</html>