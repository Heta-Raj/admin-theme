<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jul 2020 05:04:57 GMT -->
<head>
	<?php include './include_2/header.php'; 
	include './db_auth_register_boxed.php';
	 if (!isset($_SESSION['id'])) {
        header('location: ./auth_login_boxed.php');
    }

	if (isset($_POST['updatebtn'])) {
		$id = $_POST['id'];
		$username = $_POST['editusername'];
		$f_name = $_POST['editf_name'];
		$l_name = $_POST['editl_name'];
		$email = $_POST['editemail'];
		$password=$_POST['editpassword'];
		$m_pass = md5($password);
		$dob = $_POST['editdob'];
		$city = $_POST['editcity'];
		$state = $_POST['editstate'];
		$country = $_POST['editcountry'];
		$pincode = $_POST['editpincode'];
		$gender = $_POST['editgender'];

		$update = "UPDATE user_reg SET username ='$username', firstname='$f_name', lastname='$l_name', email='$email', password= '$m_pass', dob='$dob', city ='$city', state ='$state', country ='$country', pincode ='$pincode', gender='$gender' WHERE id ='$id' ";
		$res_upt = $conn->query($update);
		//print_r($update);
		if ($res_upt) {
			//echo "successfully updated";
			header('location: ./user_list.php');
		}
		else{
			echo "not updated";
		}
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
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<h4>Edit Admin</h4>
									</div>
								</div>
							</div>
							<div class="widget-content widget-content-area">
								<form method="POST" name="user_reg">

									<?php if (isset($_GET['id'])) {
										$id = $_GET['id'];
										$select = "SELECT * FROM user_reg WHERE id = '$id' ";
										$res_sel = $conn->query($select);
										$row = mysqli_fetch_assoc($res_sel);

										foreach ($res_sel as $row) {
									?>

											<input type="hidden" name="id" value="<?php echo $row['id']?>">
											<div class="form-group mb-4">
												<label for="exampleFormControlInput2">Username</label>
												<input type="text" name="editusername" class="form-control" id="exampleFormControlInput2" placeholder="Username" value="<?php echo $row['username']; ?>">
											</div>
											<div class="form-group mb-4">
												<div  class="form-row mb-4">
													<div class="col">
														<label for="">Firstname</label>
														<input type="text" name="editf_name" class="form-control" id="" placeholder="Firstname" value="<?php echo $row['firstname']; ?>">
													</div>
													<div class="col">
														<label for="">Lastname</label>
														<input type="text" name="editl_name" class="form-control" id="" placeholder="Lastname" value="<?php echo $row['lastname']; ?>">
													</div>
												</div>										
											</div>
											<div class="form-group mb-4">
												<label for="">Email address</label>
												<input type="email" name="editemail" class="form-control" id="" placeholder="name@example.com" value="<?php echo $row['email']; ?>">
											</div>
											<div class="form-group mb-4">
												<label for="">Password</label>
												<input type="password" name="editpassword" placeholder="Password" class="form-control" id="" value="<?php echo $row['password']; ?>">
											</div>
											<div class="form-group mb-4">
												<label>Date Of Birth</label>
												<input id="basicFlatpickr" name="editdob" class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date.." value="<?php echo $row['dob']; ?>">
											</div>

											<div class="form-group mb-4">
												<div class="form-row mb-4">
													<div class="col">
														<label for="exampleFormControlSelect1">City</label>
														<select class="placeholder js-states form-control" name= "editcity" selected="selected" >
															<option value="">Choose...</option>
															<option value="Ahmedabad" <?=$row['city'] == 'Ahmedabad' ? ' selected="selected"' : '';?>>Ahmedabad</option>
															<option value="Vadodara" <?=$row['city'] == 'Vadodara' ? ' selected="selected"' : '';?>>Vadodara</option>
															<option value="Surat" <?=$row['city'] == 'Surat' ? ' selected="selected"' : '';?>>Surat</option>
															<option value="Rajkot" <?=$row['city'] == 'Rajkot' ? ' selected="selected"' : '';?>>Rajkot</option>
															<option value="Gandhinagar" <?=$row['city'] == 'Gandhinagar' ? ' selected="selected"' : '';?>>Gandhinagar</option>
														</select>													
													</div>
													<div class="col">
														<label for="exampleFormControlSelect2">State</label>
														<select class="placeholder js-states form-control" name= "editstate" selected="selected">">
															<option value="">Choose...</option>
															<option value="one" <?=$row['state'] == 'Gujarat' ? ' selected="selected"' : '';?>>Gujarat</option>
															<option value="two" <?=$row['state'] == 'Maharastra' ? ' selected="selected"' : '';?>>Maharastra</option>
															<option value="three" <?=$row['state'] == 'Delhi' ? ' selected="selected"' : '';?>>Delhi</option>
															<option value="Rajasthan" <?=$row['state'] == 'Rajasthan' ? ' selected="selected"' : '';?>>Rajasthan</option>
															<option value="MP" <?=$row['state'] == 'MP' ? ' selected="selected"' : '';?>>MP</option>
														</select>
													</div>
													<div class="col">
														<label for="exampleFormControlSelect2" >Country</label>
														<select class="placeholder js-states form-control" name= "editcountry" selected="<?php echo $row['country']; ?>" >
															<option value="">Choose...</option>
															<option value="India" <?=$row['country'] == 'India' ? ' selected="selected"' : '';?>>India</option>
															<option value="US" <?=$row['country'] == 'US' ? ' selected="selected"' : '';?>>US</option>
															<option value="UK" <?=$row['country'] == 'UK' ? ' selected="selected"' : '';?>>UK</option>
															<option value="Europe" <?=$row['country'] == 'Europe' ? ' selected="selected"' : '';?>>Europe</option>
															<option value="New zealand" <?=$row['country'] == 'New zealand' ? ' selected="selected"' : '';?>>New zealand</option>
														</select>
													</div>
												</div>
											</div>

											<div class="form-group mb-4">
												<label for="">Pincode</label>
												<input type="text" name="editpincode" class="form-control" id="editpincode" placeholder="123456" maxlength="6" value="<?php echo $row['pincode']; ?>">
											</div>
											<div class="form-group mb-4 mt-3">
												<div class="row">
													<div class="col"><label for="gender">Gender</label></div>

													<div class="col n-chk">
														<label class="new-control new-radio">
															<input type="radio" class="new-control-input" name="editgender" checked id="male" value="male" >
															<span class="new-control-indicator"></span>Male
														</label>
													</div>

													<div class="col n-chk">
														<label class="new-control new-radio">
															<input type="radio" class="new-control-input" name="editgender" id="female" value="female">
															<span class="new-control-indicator"></span>Female
														</label>
													</div>
													<label for="gender" class="error" style="display: none;"></label>
												</div>


											<!-- <div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
												<label class="custom-control-label" for="gender">Male</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
												<label class="custom-control-label" for="gender">Female</label>
											</div> -->
										</div>
										<div class="d-sm-flex justify-content-between">
											<div class="field-wrapper">
												<button type="submit" id="updatebtn" name="updatebtn" class="btn btn-primary" value="">Update</button>
												<button type="submit" id="cancel" name="cancel" class="btn btn-primary" value=""><a href="user_list.php" class="add_user">Cancel</a> </button>
											</div>
										</div>
										<?php
									}

								}?>


							</form>

						</div>
					</div>
				</div>


			</div>

		</div>
		<div class="footer-wrapper">
			<div class="footer-section f-section-1">
				<p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights reserved.</p>
			</div>
			<div class="footer-section f-section-2">
				<p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
			</div>
		</div>
	</div>
	<!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->

<?php include './include_2/footer.php' ?>

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jul 2020 05:05:04 GMT -->
</html>