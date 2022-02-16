<?php
extract($_POST);
include("database.php");
$sql_u = "SELECT * FROM librarymember WHERE username='$username'";
$res_u = mysqli_query($conn, $sql_u);

if(mysqli_num_rows($res_u)>0)
{
    echo "Username Id Already Exists"; 
	exit;
}
else
    {
        $query="INSERT INTO librarymember(UserName, Password, Firstname, SurName, AddressLine1, AddressLine2, City, Telephone, Mobile) VALUES ('$UserName', '$Password', '$FirstName', '$SurName', '$AddressLine1', '$AddressLine2', '$City', '$Telephone', '$Mobile')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: login.php?status=success");
    }
  

?>