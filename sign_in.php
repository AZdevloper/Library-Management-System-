<?php
	session_start();
    include('connexion.php');

    if( $_SERVER['REQUEST_METHOD'] == "POST" ){

		// collecte data from user 
	
		$email      = $_POST['email'];
		$password   = $_POST['password'];
		
		if (!empty($password) && !empty($email)) {

		$sql = "SELECT * FROM users  WHERE email ='$email' AND password = '$password' limit 1 ";

		$result =  $conn->query($sql);
		   foreach( $result as $row ) {
                  

					if ( $row) {
						echo 'access to bd';
						$_SESSION['con'] = 'success' ;
						header("Location: index.php");
					}
             
                   }
				

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body class=" d-flex justify-content-center align-items-center">
    
<div class="container">
	<div class="d-flex justify-content-center ">
		<div class="card">
			<div class="card-header ">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body h-400px w-400px">
				<form method="post" action="sign_in.php">
					<div class="input-group form-group">
						<div class="input-group-prepend ">
							<label for="username" >
                                <span class="input-group-text h-35px" ><i class="fas fa-user" ></i></span>
                            </label>
						</div>
						<input type="text" class="form-control h-35px" placeholder="email"  name="email">
						
					</div> <br>
					<div class="input-group form-group">
						<label for="password" >
							<span class="input-group-text h-35px"><i class="fas fa-key"></i></span>
						</label>
						<input type="password" class="form-control h-35px" placeholder="password" name="password">
					</div>
					<div class=" mt-3 mx-2  remember">
						<input type="checkbox"  > Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn btn-gray login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="sign_up.php">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>

		<!-- ================== BEGIN core-js ================== -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <!-- ================== END core-js ================== -->
</body>
</html>