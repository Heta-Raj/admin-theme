<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo4/auth_login_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jul 2020 05:06:19 GMT -->
<head>
     <?php include './includes/header.php';
    include './db_auth_register_boxed.php';
    $err = '';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $m_pass = md5($password);

        $select = "SELECT * FROM user_reg WHERE username='$username' AND password= '$m_pass' ";
        $res_Select = $conn->query($select);
        //print_r($select);

        if ($res_Select->num_rows == 1) {
            while ($row = $res_Select->fetch_assoc()) {
                if ($row['password'] === $m_pass) {
                    //echo "logged in";
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $row['id'];
                               
                    header('location: ./index.php');

                }
                else{
                    $err = "Enter correct passowrd";
                }
            }
        }
        else{
            $err = "Login Failed";
            //$(".alert").show();
        }
    }
    ?>
</head>
<body class="form">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Sign In</h1>
                        <p class="">Log in to your account to continue.</p>
                        
                        <form class="text-left" method="POST" name="auth_register_boxed">
                            <div class="form">
                                <?php if($err != '' ){ ?>
                                <div class="alert alert-light-info mb-4" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong> 
                                            <?php echo $err; ?>
                                    </strong>
                                </div>
                                <?php } ?> 
                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">USERNAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="username" type="text" class="form-control" placeholder="e.g John_Doe">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <a href="forget_password.php" class="forgot-pass-link">Forgot Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                   
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>
                                </div>

                               
                                

                                <p class="signup-link">Not registered ? <a href="auth_register_boxed.php">Create an account</a></p>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

<?php include './includes/footer.php'?> 
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/auth_login_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jul 2020 05:06:20 GMT -->
</html>