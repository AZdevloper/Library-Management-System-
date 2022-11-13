<?php
include('scripts.php');
	session_start();


	if($_SESSION['con'] == 'success' ){
		 
	echo'	hello';

	}else {
		header("Location: sign_in.php");
		die("error");
	}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>library MGS</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body>
	
	<!-- BEGIN #loader -->			
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->

	<!-- BEGIN #app -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed">
		<!-- BEGIN #header -->
		<div id="header" class="app-header">
			<!-- BEGIN navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><i class="fa-solid fa-book m-10px"></i> <b class="me-1">Mes</b> Documents</a>
				<button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- END navbar-header -->
			<!-- BEGIN header-nav -->
			<div class="navbar-nav">
				<div class="navbar-item navbar-form">
					<form action="" method="POST" name="search" id="form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
				<div class="navbar-item dropdown">
					<a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
						<i class="fa fa-bell"></i>
						<span class="badge">5</span>
					</a>
					<div class="dropdown-menu media-list dropdown-menu-end">
						<div class="dropdown-header">NOTIFICATIONS (5)</div>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-bug media-object bg-gray-500"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
								<div class="text-muted fs-10px">3 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="assets/img/user/user-1.jpg" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">John Smith</h6>
								<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
								<div class="text-muted fs-10px">25 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="assets/img/user/user-2.jpg" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Olivia</h6>
								<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
								<div class="text-muted fs-10px">35 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-plus media-object bg-gray-500"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading"> New User Registered</h6>
								<div class="text-muted fs-10px">1 hour ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-envelope media-object bg-gray-500"></i>
								<i class="fab fa-google text-warning media-object-icon fs-14px"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading"> New Email From John</h6>
								<div class="text-muted fs-10px">2 hour ago</div>
							</div>
						</a>
						<div class="dropdown-footer text-center">
							<a href="javascript:;" class="text-decoration-none">View more</a>
						</div>
					</div>
				</div>
				
				<div class="navbar-item navbar-user dropdown">
					<a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
						<img src="assets/img/user/user-13.jpg" alt="" /> 
						<span>
							<span class="d-none d-md-inline">Jilali Smith</span>
							<b class="caret"></b>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end me-1">
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item d-flex align-items-center">
							Inbox
							<span class="badge bg-danger rounded-pill ms-auto pb-4px">2</span> 
						</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="javascript:;" class="dropdown-item">Log Out</a>
					</div>
				</div>
			</div>
			<!-- END header-nav -->
		</div>
		<!-- END #header -->
	
	<!-- BEGIN #sidebar -->
		<div id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-profile">
						<a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
							<div class="menu-profile-cover with-shadow"></div>
							<div class="menu-profile-image">
								<img src="assets/img/user/user-13.jpg" alt="" />
							</div>
							<div class="menu-profile-info">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										Jilali Smith
									</div>
									<div class="menu-caret ms-auto"></div>
								</div>
								<small>Front end developer</small>
							</div>
						</a>
					</div>
					<div id="appSidebarProfileMenu" class="collapse">
						<div class="menu-item pt-5px">
							<a href="javascript:;" class="menu-link">
								<div class="menu-icon"><i class="fa fa-cog"></i></div>
								<div class="menu-text">Settings</div>
							</a>
						</div>
						<div class="menu-item">
							<a href="javascript:;" class="menu-link">
								<div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
								<div class="menu-text"> Send Feedback</div>
							</a>
						</div>
						<div class="menu-item pb-5px">
							<a href="javascript:;" class="menu-link">
								<div class="menu-icon"><i class="fa fa-question-circle"></i></div>
								<div class="menu-text"> Helps</div>
							</a>
						</div>
						<div class="menu-divider m-0"></div>
					</div>
					<div class="menu-header">Navigation</div>
					
					<div class="menu-item">
						<a href="index.html" class="menu-link">
							<div class="menu-icon">
								<i class="fa fa-list-check"></i>
							</div>
							<div class="menu-text">Scrum Board</div>
						</a>
					</div>
					

					<!-- BEGIN minify-button -->
					<div class="menu-item d-flex">
						<a  href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
					</div>
				
					<!-- END minify-button -->
					</div>
					<form action="scripts.php" method="POST" >
						<div class="form-group">
							
							<button type="submit" class="btn  btn-danger"  name="sign_out" value="sign_out"><i class="fa-solid fa-right-from-bracket"></i></i></button>
						</div>
					</form>
					
				
				<!-- END menu -->
			</div>
			<!-- END scrollbar -->
		
		</div>
		<div class="app-sidebar-bg"></div>
		<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
		<!-- END #sidebar -->
		
		<!-- BEGIN #content -->
		<div id="content" class="app-content" style="min-height: 100vh; background: url(assets/img/cover/cover-scrum-board.png) no-repeat fixed; background-size: 360px; background-position: right bottom;">
			<div class="d-flex align-items-center mb-3">
				<div>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
						<li class="breadcrumb-item active">Scrum Board </li>
					</ol>
				
				</div>
				
				
			</div>
			
            <!-- alert returned messages -->
            
			<?php if (isset($_SESSION['message'])): ?>
				<div class="alert alert-green alert-dismissible fade show">
					<strong>Success!</strong>
						<?php 
							echo $_SESSION['message'];
							unset($_SESSION['message']);
							
							
						?>
					
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			<?php endif  ?>
			<div class=" d-flex justify-content-around  align-items-center">
				<span class=" fw-800 fs-20px w-200px h-100px bg-blue-100 ">
					<?php statistical()?> <br> livre disponible
				</span>
				<span class=" fw-800 fs-20px w-200px h-100px bg-blue-100 ">
					<?php statistical()?> <br> livre ajouter
				</span>
				<span class=" fw-800 fs-20px w-200px h-100px bg-blue-100 ">
					<?php echo $indexsuprem ?> <br> livre supremer
				</span>
				<span class=" fw-800 fs-20px w-200px h-100px bg-blue-100 ">
					<?php statistical()?> <br> livre modifier
				</span>

			</div>
            
			<table class="table">
				<thead>
				  <tr>
					<th scope="col">#</th>
					<th scope="col">Titre</th>
					<th scope="col">Auteur</th>
					<th scope="col">Année</th>
					<th scope="col">langage</th>
					<th scope="col">Disponible</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<th scope="row">1</th>
					<td>seven habits </td>
					<td>marck</td>
					<td>2001</td>
					<td>francais</td>
					<td>5</td>
				  </tr>
				
				</tbody>
			  </table>
            
		<!-- END #content -->
		
		
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->
 <!-- TASK MODAL -->
	<div class="modal fade" id="modal-task">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="scripts.php" method="POST" id="form-task">
					<div class="modal-header">
						<h5 class="modal-title"> Add Task </h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<?php if (isset($_SESSION['form_vide_message'])): ?>
				<div class="alert alert-danger alert-dismissible fade show">
				<strong>wrong!</strong>
					<?php 
						echo $_SESSION['form_vide_message']; 
						unset($_SESSION['form_vide_message']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			<?php endif ?>
			<a href=""></a>
					<div class="modal-body">
							<!-- This Input Allows Storing Task Index  -->
							<input name="input-hidden" type="hidden" id="task-id" value="">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" name="title" class="form-control" id="task-title"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Type</label>
								<div class="ms-3">
									<div class="form-check mb-1">
										<input class="form-check-input" name="task-type" type="radio" value="1" id="task-type-feature"/>
										<label class="form-check-label" for="task-type-feature">Feature</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="task-type" type="radio" value="2" id="task-type-bug"/>
										<label class="form-check-label" for="task-type-bug">Bug</label>
									</div>
								</div>
								
								
							</div>
							<div class="mb-3">
								<label class="form-label">Priority</label>
								<select name='Priority' class="form-select" id="task-priority">
									<option selected > select priority her </option>
									<option id="1_low" value="1" >Low</option>
									<option id="2_Medium" value="2" >Medium</option>
									<option id="3_High" value="3">High</option>
									<option id="4_Critical" value="4">Critical</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select class="form-select" id="task-status" name="Status" >
									<option value="" >Please select</option>
									<option value="1">To Do</option>
									<option value="2">In Progress</option>
									<option value="3">Done</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Date</label>
								<input type="date" class="form-control" name="Date" id="task-date"/>
							</div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<textarea class="form-control" name='Description' rows="10" id="task-description"></textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button  type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</a>
						<button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
						<button type="submit" name="save" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>
					</div >
				</form>
			</div>
		</div>
	</div>
		<!-- ================== BEGIN core-js ================== -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <!-- ================== END core-js ================== -->

	<script>
	</script>
</body>
</html>