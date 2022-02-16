<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Welcome to Phoenix Library</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assests/css/style.css">

</head>
<body>
<div class="signup-form">
    <form action="reg2.php" method="post" enctype="multipart/form-data">
		<h2>Register</h2>
		<p class="hint-text">Create your account</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="FirstName" placeholder="FirstName" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="SurName" placeholder="SurName" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="UserName" placeholder="UserName" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="AddressLine1" placeholder="AddressLine1" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="AddressLine2" placeholder="AddressLine2" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="Password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="City" placeholder="City" required="required">
        </div>
        <div class="form-group">
        	<input type="number" class="form-control" name="Telephone" placeholder="Telephone" required="required">
        </div>
        <div class="form-group">
        	<input type="number" class="form-control" name="MobileNumber" placeholder="MobileNumber" required="required">
        </div>        
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="https://www.youtube.com/watch?v=O91DT1pR1ew">Terms of Use</a> & <a href="https://www.youtube.com/watch?v=O91DT1pR1ew">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
    </form>
	
</div>
</body>
</html>