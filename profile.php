<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include './include_2/header.php'; 
	include './db_auth_register_boxed.php';
	if (!isset($_SESSION['id'])) {
	 	//echo "not login";
		header('location: ./auth_login_boxed.php');
	}
	if (isset($_POST['submit'])) {
		$id = $_SESSION['id'];
		$username = $_POST['username'];
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$email = $_POST['email'];
		$dob = $_POST['dob'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$gender = $_POST['gender'];
	}

	?>
</head>
<body>
	<!-- BEGIN LOADER -->
	<div id="load_screen"> <div class="loader"> <div class="loader-content">
		<div class="spinner-grow align-self-center"></div>
	</div></div></div>
	<!--  END LOADER -->

	<?php include './include_2/body_header.php' ?>
	<!--  BEGIN MAIN CONTAINER  -->
	<div class="main-container" id="container">

		<div class="overlay"></div>
		<div class="search-overlay"></div>

		<?php include './include_2/sidebar.php' ?>

		<!--  BEGIN CONTENT AREA  -->
		
		<div id="content" class="main-content">
			<div class="layout-px-spacing">
				<?php 
				if (isset($_SESSION['id'])) {
					$id = $_SESSION['id'];
					$select = "SELECT * FROM user_reg WHERE id = '$id' ";
					$res_sel = $conn->query($select);
										//print_r($select);
					$row = mysqli_fetch_assoc($res_sel);
				}
				?>
				<div class="row layout-top-spacing">
					<div class="col layout-top-spacing">
						<div class="user-profile layout-spacing">
							<div class="widget-content widget-content-area">	
								<div class="d-flex justify-content-between">
									<h3 class="">Profile</h3>
									<a href="edit_profile.php" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
								</div>
								<form method="POST" enctype="multipart/form-data">
								<div class="text-center user-info">
									<img src="<?php echo "/admin_theme/uploads/" . $row['image']; ?>" alt="avatar" width= "220px" height="auto">
									<p class=""><?php echo $row['username']; ?></p>
								</div>

								<div class="user-info-list">


									<div class="">
										<ul class="contacts-block list-unstyled">
											<li class="contacts-block__item">
												<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><?php echo $row['firstname']. ' ' . $row['lastname']; ?>
											</li>
											<li class="contacts-block__item">
												<a href="mailto:example@mail.com"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
													<?php echo $row['email']; ?>
												</li>
												<li class="contacts-block__item">
													<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
													<?php echo $row['dob']; ?>
												</li>
												<li class="contacts-block__item">
													<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg><?php echo $row['city']. ', '. $row['state'].', '.$row['country']. ', '. $row['pincode']; ?>
												</li>
												<li class="contacts-block__item">
													<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
													<?php echo $row['gender']?>
												</li>
												
											</ul>
										</div>                                    
									</div>
								</div>
								</form>
							</div>     
						</div>


					</div>

				</div>
				<?php include './include_2/body_footer.php'  ?>
			</div>
			<!--  END CONTENT AREA  -->

		</div>
		<!--  END CONTENT AREA  -->

	</div>
	<!-- END MAIN CONTAINER -->


	<?php include './include_2/footer.php' ?>
</body>
</html>