<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn, "SELECT * FROM librarymember where UserName='$UserName' and Password='$Password'");
    $row = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["UserName"]=$row['UserName'];
        $_SESSION["Password"] = $row['Password'];
        $_SESSION["FirstName"]=$row['FirstName'];
        $_SESSION["SurName"]=$row['SurName']; 
        $_SESSION["AddressLine1"] = $row['AddressLine1'];
        $_SESSION["AddressLine2"] = $row['AddressLine2'];
        $_SESSION["City"] = $row['City'];
        $_SESSION["Telephone"] = $row['Telephone'];
        $_SESSION["MobileNumber"] = $row['MobileNumber'];
        
        header("Location: Home.php"); 
    }
    else
    {
        header("Location: Login.php");
        echo "Invalid UserName ID/Password";
    }
}
?>
 