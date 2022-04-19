<?php
    // Initialize the session
    // session_start();
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_COOKIE["loggedinHDVN"]) && $_COOKIE["loggedinHDVN"] == true){
        header("location: /fiot-hdvn-a/");
        exit;
    }
    
    // Include config file
    require_once 'config/config.php';
    
    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter your account.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Validate credentials
        if(empty($username_err) && empty($password_err)){
            // Prepare a select statement
            $sql = "SELECT id, username, password, full_name, position, department, email, role, role_name FROM tb_account WHERE username = ?";
            
            if($stmt = mysqli_prepare($connect, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = $username;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username,  $hashed_password, $full_name, $position, $department, $email, $role, $role_name);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                // session_start();
                                // // Store data in session variables
                                // $_SESSION["loggedinHDVN"] = true;
                                // $_SESSION["id"] = $id;
                                // $_SESSION["username"] = $username;
                                // $_SESSION["role"] = $role; 

                                if($role == null){
                                    $role = 6;
                                    $role_name = 'Please contact Master';
                                }                 
                                setcookie('id', $id, time() + (12 * 60 * 60), "/");
                                setcookie('username', $username, time() + (12 * 60 * 60), "/");
                                setcookie('full_name', $full_name, time() + (12 * 60 * 60), "/");
                                setcookie('position', $position, time() + (12 * 60 * 60), "/");
                                setcookie('department', $department, time() + (12 * 60 * 60), "/");
                                setcookie('email', $email, time() + (12 * 60 * 60), "/");
                                setcookie('role', $role, time() + (12 * 60 * 60), "/");
                                setcookie('role_name', $role_name, time() + (12 * 60 * 60), "/");
                                setcookie('loggedinHDVN', true, time() + (12 * 60 * 60), "/");

                                // Redirect user to welcome page
                                header("location: /fiot-hdvn-a/");
                            } else{
                                // Display an error message if password is not valid
                                $password_err = "Wrong password, Please enter password again.";
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $username_err = "Account name does not exist.";
                    }
                } else{
                    echo "Login failed, Please try again.";
                }
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        // Close connection
        mysqli_close($connect);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HDVN LOGIN</title>

    <!-- Favicons -->
    <link href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/dist/img/logo.png" ?>"
        rel="icon">
    <link href="<?php echo dirname($_SERVER['SCRIPT_NAME']) . "/projects/common/public/dist/img/logo.png" ?>"
        rel="apple-touch-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="projects/common/public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="projects/common/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="projects/common/public/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>HDVN</b> FACTORY</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your begin</p>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="username" name="username" class="form-control" placeholder="User Name" autocomplete="username" value="<?php echo $username; ?>">
                        
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                      <span class="help-block text-danger"><?php echo $username_err; ?></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="current-password" >
                        <input type="password" name="passwordnew" class="form-control" placeholder="Password" autocomplete="new-password" hidden="hidden">
                        
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                      <span class="help-block text-danger"><?php echo $password_err; ?></span>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <br>
                <p class="login-box-msg">Don't have an account? <a class="text-primary" href="register.php"><b>Sign Up</b></a></p>

                
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="projects/common/public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="projects/common/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="projects/common/public/dist/js/adminlte.min.js"></script>
</body>

</html>