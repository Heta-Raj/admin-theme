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
<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">

    <!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
    <!-- <header class="header navbar navbar-expand-sm">
        
    </header> -->
</div>
    <!--  END NAVBAR  -->

    <?php 
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $select = "SELECT * FROM user_reg WHERE username = '$username' ";
                    $res_sel = $conn->query($select);
                                        //print_r($select);
                    $row = mysqli_fetch_assoc($res_sel);

                }
                ?>
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>        

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="assets/img/logo.svg" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link"> CORK </a>
            </li>
        </ul>

      

        <ul class="navbar-item flex-row ml-md-auto">   
            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="<?php echo "/admin_theme/uploads/" . $row['image']; ?>" alt="avatar">
                    <!-- <img src="assets/img/profile-16.jpg" alt="avatar"> -->
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a class="" href="profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                        </div>

                        <div class="dropdown-item">
                            <a class="" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

