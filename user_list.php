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
					<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
						<div class="widget-content widget-content-area br-6">
							<div class="d-sm-flex justify-content-between">
								<div class="field-wrapper">
									<button type="submit" class="btn btn-primary" style="color: #ffffff;"><a href="user_form.php" class="add_user"> ADD USER</a></button>
								</div>
							</div>
							<div class="table-responsive mb-4 mt-4">
								<table id="zero-config" class="table table-hover" style="width:100%">
									<thead>
										<tr>
											<th>Id</th>
											<th>UserName</th>
											<th>Firstname</th>
											<th>Lastname</th>
											<th>Email</th>
											<th>Date of Birth</th>
											<th>Country</th>
											<th>Gender</th>
											<th class="no-content"></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$select = "SELECT * FROM `user_reg` ";
										$res_sel = $conn->query($select);
										if ($res_sel->num_rows > 0 ) {
											while ($row = $res_sel->fetch_assoc()) { 

												?>
												<tr>
													<td><?php echo $row['id'];  ?></td>
													<td><?php echo $row['username'];   ?></td>
													<td><?php echo $row['firstname'];  ?></td>
													<td><?php echo $row['lastname'];  ?></td>
													<td><?php echo $row['email'];  ?></td>
													<td><?php echo $row['dob'];  ?></td>
													<td><?php echo $row['country'];  ?></td>
													<td><?php echo $row['gender'];  ?></td>
													<td><a href="user_edit.php?id=<?php echo $row['id'];  ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="edit" name="edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></td>
													<td><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td>
													

												</tr>

												<?php 
											}
										}
										else{
											echo "No Data";
										} 
										?>


									</tbody>
									<tfoot>
										<tr>
											<th>Id</th>
											<th>UserName</th>
											<th>Firstname</th>
											<th>Lastname</th>
											<th>Email</th>
											<th>Date of Birth</th>
											<th>Country</th>
											<th>Gender</th>
											<th></th>
										</tr>
									</tfoot>
								</table>
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