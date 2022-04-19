<?php
    // Initialize the session
    // session_start();
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_COOKIE["loggedinHDVN"]) && $_COOKIE["loggedinHDVN"] === true){
        header("location: /fiot-hdvn-a/");
        exit;
    }
    
    // Include config file
    require_once 'config/config.php';
    
    // Define variables and initialize with empty values
    $username = $password = $full_name = $position = $department = $email = "";
    $username_err = $full_name_err =  $password_err = $full_name_err = $position_err = $department_err = $email_err = "";
    
    $sqlcheck_account = "SELECT `username`, `email` FROM `tb_account` ORDER BY `id` ASC";
    $resultcheck_account = mysqli_query( $connect, $sqlcheck_account );
    // $check_account = mysqli_fetch_assoc( $resultcheck_account );
    if ($resultcheck_account && $resultcheck_account->num_rows > 0) {
        // tiến hành lặp dữ liệu
        $i = 0;
        while ($row = $resultcheck_account->fetch_assoc()) {
            //thêm kết quả vào mảng
            $data_account[$i][0]=$row['username'];
            $data_account[$i][1]=$row['email'];
            $i++;
        }
    }
    else{
        $data_account[0][0]='';
        $data_account[0][1]='';
    }
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
                $password = password_hash($password, PASSWORD_DEFAULT);
                
            }
            //check full name
            if(empty($_POST["full_name"])){
                $full_name_err = "Please enter your full name.";
            } else{
                $full_name = $_POST["full_name"];
                
                
            }
            //check position
            if(empty($_POST["position"])){
                $position_err = "Please enter your position.";
            } else{
                $position = $_POST["position"];
                
                
            }
            //check department
            if(empty($_POST["department"])){
                $department_err = "Please enter your department.";
            } else{
                $department = $_POST["department"];
                
                
            }

            //check email
            if(empty($_POST["email"])){
                $email_err = "Please enter your email.";
            } else{
                $email = $_POST["email"];
                
                
            }

            //submit register
            if(isset($_POST["register"])){

                for($i = 0; $i < count($data_account); $i++){
                    if($username == $data_account[$i][0]){
                        $username_err = "Username already exists";
                        // die();
                    }
                    if($email == $data_account[$i][1]){
                        $email_err = "Email already exists";
                    }
                }
                if($username_err == ''){
                    $sqlregister = "INSERT INTO `tb_account`(`username`, `password`, `full_name`, `position`, `department`, `email`) VALUES ('$username', '$password', '$full_name', '$position', '$department', '$email')";
                    if ( mysqli_query( $connect, $sqlregister ) ) {
                        mysqli_close( $connect );
                    }
                    echo "<script>document.location = '/fiot-hdvn-a/'</script>";
                }
                
            }
            else if(isset($_POST["post_delete_account"])){
                $deletestt = $_POST['delete_stt'];

                $sqldelete = "DELETE FROM `tb_account` WHERE `id` = '$deletestt'";
                if ( mysqli_query( $connect, $sqldelete ) ) {
                    // echo 'File uploaded successfully'
                    // myAlert1( 'Start loss cause success', 'machinerecord.php?');
                    
                    mysqli_close( $connect );
                    // die();
                    
                }
                echo "<script>document.location = 'register.php'</script>";
            }
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HDVN REGISTER</title>
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
                <a href="index2.html" class="h1"><b>HDVN</b> FACTORY</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg h3"><b>CREAT ACCOUNT</b></p>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="username" name="username" class="form-control" placeholder="Usename" autocomplete="username" value="<?php echo $username; ?>">
                        
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

                    <div class="input-group mb-3">
                        <input type="full_name" name="full_name" class="form-control" placeholder="Full Name" autocomplete="full_name" value="<?php echo $full_name; ?>">
                        
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-card "></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                      <span class="help-block text-danger"><?php echo $full_name_err; ?></span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="position" name="position" class="form-control" placeholder="Position" autocomplete="position" value="<?php echo $position; ?>">
                        
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-briefcase"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                      <span class="help-block text-danger"><?php echo $position_err; ?></span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="department" name="department" class="form-control" placeholder="Department" autocomplete="department" value="<?php echo $department; ?>">
                        
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-building"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                      <span class="help-block text-danger"><?php echo $department_err; ?></span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="email" value="<?php echo $email; ?>">
                        
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                      <span class="help-block text-danger"><?php echo $email_err; ?></span>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" id="register" name="register">Sign Up</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <br>
                <p class="login-box-msg">Have already an account? <a class="text-primary" href="login.php"><b>Login here</b></a></p>
                
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