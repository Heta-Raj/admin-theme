<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include './include_2/header.php'; 
	include './db_auth_register_boxed.php';
	if (!isset($_SESSION['username'])) {
	 	//echo "not login";
		header('location: ./auth_login_boxed.php');
	}
	if (isset($_POST['submit'])) {
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

				<div class="row layout-top-spacing">
					<div class="col-lg-12 col-12 layout-spacing">
						<div class="statbox widget box box-shadow">
							<div class="widget-header">                                
								<div class="row">
									<div class="col">
										<h4>Profile</h4>
									</div>
									<div class="col">
										<div class="d-sm-flex justify-content-end">
										<div class="field-wrapper">
											<button name="edit_profile" class="btn btn-primary"><a href="edit_profile.php" class="add_user"> Edit Profile </a> </button>
										</div>
									</div>
									</div>
								</div>
							</div>
							
							<div class="widget-content widget-content-area">

								<?php 
								if (isset($_SESSION['username'])) {
									$username = $_SESSION['username'];
									$select = "SELECT * FROM user_reg WHERE username = '$username' ";
									$res_sel = $conn->query($select);
										//print_r($select);
									$row = mysqli_fetch_assoc($res_sel);

								}
								?>

								<form method="POST" enctype="multipart/form-data">
									<?php if (isset($row['image'])) {
									$target_dir = "/admin_theme/uploads/" . $row['image']; ?>
										<img src="<?php echo $target_dir; ?>" alt="user_img">
									<?php } ?>
									<div class="form-group mb-4">
										<label for="exampleFormControlInput2">Username</label>
										<input type="text" name="username" class="form-control" id="exampleFormControlInput2" placeholder="Username" value="<?php echo $row['username']?>" readonly>
									</div>
									<div class="form-group mb-4">
										<div  class="form-row mb-4">
											<div class="col">
												<label >Firstname</label>
												<input type="text" name="f_name" class="form-control"  placeholder="Firstname" value="<?php echo $row['firstname']?>" readonly>
											</div>
											<div class="col">
												<label >Lastname</label>
												<input type="text" name="l_name" class="form-control"  placeholder="Lastname" value="<?php echo $row['lastname']?>" readonly>
											</div>
										</div>										
									</div>
									<div class="form-group mb-4">
										<label >Email address</label>
										<input type="email" name="email" class="form-control" placeholder="name@example.com" value="<?php echo $row['email']?>" readonly>
									</div>
									
									<div class="form-group mb-4">
										<label>Date Of Birth</label>
										<input  name="dob" class="form-control " type="text" placeholder="Select Date.." value="<?php echo $row['dob']?>" readonly>
									</div>

									<div class="form-group mb-4">
										<div class="form-row mb-4">
											<div class="col">
												<label for="exampleFormControlSelect1">City</label>
												<input  name="city" class="form-control" type="text" placeholder="city" value="<?php echo $row['city']?>" readonly>

											</div>
											<div class="col">
												<label for="exampleFormControlSelect2">State</label>
												<input  name="state" class="form-control" type="text" placeholder="state" value="<?php echo $row['state']?>" readonly>
											</div>
											<div class="col">
												<label for="exampleFormControlSelect2" >Country</label>
												<input  name="country" class="form-control" type="text" placeholder="country" value="<?php echo $row['country']?>" readonly>
											</div>
										</div>
									</div>
									

									<div class="form-group mb-4">
										<label for="">Pincode</label>
										<input type="text" name="pincode" class="form-control" placeholder="123456" maxlength="6" value="<?php echo $row['pincode']?>" readonly>
									</div>
									<div class="form-group mb-4 mt-3">
										<div class="row">
											<div class="col"><label for="gender">Gender</label></div>

											<div class="col n-chk">
												<label class="new-control new-radio">
													<input type="radio" class="new-control-input" name="gender" id="male" value="male" checked disabled>
													<span class="new-control-indicator"></span>Male
												</label>
											</div>

											<div class="col n-chk">
												<label class="new-control new-radio">
													<input type="radio" class="new-control-input" name="gender" id="female" value="female" disabled>
													<span class="new-control-indicator"></span>Female
												</label>
											</div>
											<label for="gender" class="error" style="display: none;"></label>
										</div>
									</div>
									<div class="d-sm-flex justify-content-between">
										<div class="field-wrapper">

											<button type="submit" id="submit" name="submit" class="btn btn-primary" value=""> Update</button>
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
		<!-- END MAIN CONTAINER -->


		<?php include './include_2/footer.php' ?>
	</body>
	</html>