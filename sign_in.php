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
			$is=0;
			foreach( $result as $row ) {
			
					if($email==$row['email']){
							$is++;
							
					}
				
			}
					if ($is>0) {
						$is++;
						$_SESSION["userfrnam"] = $row["first_name"];
						$_SESSION["userlsnam"] = $row["last_name"];
						$_SESSION["useremail"] = $row["email"];
						$_SESSION["userid"] = $row["id"]	;
										
						$_SESSION['con'] = 'success' ;
						header("Location: index.php");
					}else {
					
						$_SESSION['login_error'] = 'email or password is incorrect ' ;
						header("Location: sign_in.php");

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
	<title>library MGS</title>

	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body class=""style="">
<div class="banner">
	
		<video autoplay muted loop id="myVideo">
			<source src="assets/video/library.mp4" type="video/mp4">
		</video>
		  
		<div class="card_continer  ">
			
					<div class="  row  ">
						
			
				
						<div class="card_col_1 d-none p-3 d-sm-none d-md-block bg-opacity-65 bg-black-300 border ms-md-5 rounded-3 ms-xl-5 ms-xxl-1  col ">
							<div class=" flex-column row gx-lg-4">
								<h3 class=" col"><span class=" text-blue-300">library MGS</span></h3>
								<p class="col">A library management system is software that is designed to manage all the functions of a library.</p>
								<div class=" col d-flex justify-content-end social_icon">
									<span><i class="fab fa-facebook-square"></i></span>
									<span><i class="fab fa-google-plus-square"></i></span>
									<span><i class="fab fa-twitter-square"></i></span>
								</div>
								<div class=" col-sm-auto d-flex justify-content-center">
									<img class="img_login" src="assets/gif/e4c29445ec.gif" alt="">
								</div>
							</div>
							

						</div>

						<div class="card_col_2 p-3 bg-black-100 col border rounded-3 me-xl-5 me-xxl-1 me-md-5 bg-opacity-65  " style="min-height: 400px;">
							<h3>log in</h3>
							<p>please fill in this form to login ?</p>
							<div class="d-flex justify-content-end social_icon">
								<span><i class="fab fa-facebook-square"></i></span>
								<span><i class="fab fa-google-plus-square"></i></span>
								<span><i class="fab fa-twitter-square"></i></span>
							</div>
							<form method="post" id="" action="sign_in.php">
					
								<?php if(isset($_SESSION['login_error'])): ?>
									<div class="alert alert-danger alert-dismissible fade show">
										<strong>wrong!</strong>
										<?php 
									echo $_SESSION['login_error'] ; 
									
										?>
										<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
									</div>
									<?php endif ?>
								<div class="input-group">
									<div class=" me-1 ">
										<label for="email" >
											<span class="input-group-text h-35px" ><i class="fa fa-envelope"></i></span>
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
									<input type="submit" value="Login" class="btn btn-gray login_btn"> <span> <a href="sign_up.php" rel=""> sign up</a> </span>
								</div>
							</form>
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