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
		$password = $_POST['password'];
		$m_pass = md5($password);
		$dob = $_POST['dob'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$pincode = $_POST['pincode'];
		$gender = $_POST['gender'];

		
		
				$update = "UPDATE user_reg SET  username= '$username', firstname='$f_name', lastname='$l_name', email='$email', password= '$m_pass', dob='$dob', city ='$city', state ='$state', country ='$country', pincode ='$pincode', gender='$gender' WHERE id ='$id' ";
				$res_upt = $conn->query($update);
		//print_r($update);
				if ($res_upt) {
				//echo "successfully updated";
					//header('location: ./profile.php');
				}
				else{
					echo "not updated";
				}
		
		


		

		if ($_FILES['upload_img']['size'] > 0) {

			$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/admin_theme/uploads/";
			$img_name = date("y-m-s-H-i-s"). basename($_FILES["upload_img"]["name"]);

			$target_file = $target_dir . $img_name;
			$temp_name = $_FILES["upload_img"]["tmp_name"];
			echo $temp_name;

			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if ($temp_name !== false) {
				$uploadOk = 1;
				$sessionusername = $_SESSION['username'];
				$update_img = "UPDATE user_reg SET image= '$img_name' WHERE username = '$sessionusername'";
				$res_upt = $conn->query($update_img);
				if (move_uploaded_file($temp_name, $target_file)) {
					header("location:./profile.php");
				}
				else{
					echo "Error in image insertion";
				}
			}
			else{
				echo "File is not an img";
				$uploadOk = 0;
			}
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
									<div class="col">
										<h4>Edit Profile</h4>
									</div>
									
								</div>
							</div>
							
							<div class="widget-content widget-content-area">

								<?php 
								if (isset($_SESSION['id'])) {
									
									$id = $_SESSION['id'];
									$select = "SELECT * FROM user_reg WHERE id = '$id' ";
									$res_sel = $conn->query($select);
										//print_r($select);
									$row = mysqli_fetch_assoc($res_sel);
								}
								?>
								<form method="POST" enctype="multipart/form-data">

									<div class="custom-file-container" data-upload-id="myFirstImage">
										<?php if (isset($row['image'])) {
											$target_dir = "/admin_theme/uploads/" . $row['image']; ?>
											<img src="<?php echo $target_dir; ?>" alt="user_img" width= "220px" height="auto">
										<?php } ?>
										<label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
										<label class="custom-file-container__custom-file" >
											<input type="file" class="custom-file-container__custom-file__custom-file-input" name="upload_img" accept="image/*">
											<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
											<span class="custom-file-container__custom-file__custom-file-control"></span>
										</label> 
										<div class="custom-file-container__image-preview"></div>
									</div>

									<div class="form-group mb-4">
										<label for="exampleFormControlInput2">Username</label>
										<input type="text" name="username" class="form-control" id="exampleFormControlInput2" placeholder="Username" value="<?php echo $row['username']?>" >
									</div>
									<div class="form-group mb-4">
										<div  class="form-row mb-4">
											<div class="col">
												<label >Firstname</label>
												<input type="text" name="f_name" class="form-control"  placeholder="Firstname" value="<?php echo $row['firstname']?>" >
											</div>
											<div class="col">
												<label >Lastname</label>
												<input type="text" name="l_name" class="form-control"  placeholder="Lastname" value="<?php echo $row['lastname']?>" >
											</div>
										</div>										
									</div>
									<div class="form-group mb-4">
										<label >Email address</label>
										<input type="email" name="email" class="form-control" placeholder="name@example.com" value="<?php echo $row['email']?>" >
									</div>
									<div class="form-group mb-4">
										<label for="">Password</label>
										<input type="password" name="password" placeholder="Password" class="form-control" id="" value="<?php echo $row['password']?>">
									</div>

									<div class="form-group mb-4">
										<label>Date Of Birth</label>
										<input id="basicFlatpickr" name="dob" class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date.." value="<?php echo $row['dob']?>" >
									</div>

									<div class="form-group mb-4">
										<div class="form-row mb-4">
											<div class="col">
												<label for="exampleFormControlSelect1">City</label>
												<select class="placeholder js-states form-control" name= "city" selected="selected" >
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
												<select class="placeholder js-states form-control" name= "state" selected="selected">">
													<option value="">Choose...</option>
													<option value="Gujarat" <?=$row['state'] == 'Gujarat' ? ' selected="selected"' : '';?>>Gujarat</option>
													<option value="Maharastra" <?=$row['state'] == 'Maharastra' ? ' selected="selected"' : '';?>>Maharastra</option>
													<option value="Delhi" <?=$row['state'] == 'Delhi' ? ' selected="selected"' : '';?>>Delhi</option>
													<option value="Rajasthan" <?=$row['state'] == 'Rajasthan' ? ' selected="selected"' : '';?>>Rajasthan</option>
													<option value="MP" <?=$row['state'] == 'MP' ? ' selected="selected"' : '';?>>MP</option>
												</select>
											</div>
											<div class="col">
												<label for="exampleFormControlSelect2" >Country</label>
												<select class="placeholder js-states form-control" name= "country" selected="<?php echo $row['country']; ?>" >
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
										<input type="text" name="pincode" class="form-control" placeholder="123456" maxlength="6" value="<?php echo $row['pincode']?>" >
									</div>
									<div class="form-group mb-4 mt-3">
										<div class="row">
											<div class="col"><label for="gender">Gender</label></div>

											<div class="col n-chk">
												<label class="new-control new-radio">
													<input type="radio" class="new-control-input" name="gender" id="male" value="male" checked >
													<span class="new-control-indicator"></span>Male
												</label>
											</div>

											<div class="col n-chk">
												<label class="new-control new-radio">
													<input type="radio" class="new-control-input" name="gender" id="female" value="female" >
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
		<!--  END CONTENT AREA  -->

	</div>
	<!-- END MAIN CONTAINER -->


	<?php include './include_2/footer.php' ?>
</body>
</html>