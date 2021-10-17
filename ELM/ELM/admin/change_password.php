<?php 
session_start();
if(!isset($_SESSION['id'])){header("Location:login.php"); exit;}
include'config.php';
$error = '';
$success = '';
if(isset($_POST['submit'])){
     $old_password =$_POST['old_password'];
     $new_password =$_POST['new_password'];
    // $confirm_password =$_POST['confirm_password'];
     $id = $_SESSION['id'];
     $query = "SELECT * FROM admin_login where password='$old_password' AND id='$id'";

     $sql=mysqli_query($conn,$query);
$num=mysqli_fetch_array($sql);
if($num>0){
    $con=mysqli_query($conn,"update admin_login set password='$new_password' where id='$id'");
    $success="Password Changed Successfully !!";
}
else
{
$error="Old Password not match !!";
}
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php include'head.php'; ?>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <?php include'header.php'; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'sidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <form class="form-horizontal" method="POST">
                                <div class="card-body">
                                    <h4 class="card-title">Change Password</h4>
                                    <div class="error-msg"><?php echo $error; ?></div>
                                    <div class="success-msg"><?php echo$success; ?></div>
                                    <div class="form-group row">
                                        <label for="old_password" class="col-sm-5 control-label col-form-label">Old Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_password" class="col-sm-5  control-label col-form-label">New Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirm_password" class="col-sm-5  control-label col-form-label">Confirm Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required="">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" value="Change Password" id="submit" name="submit" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>

    $(function () {
        $("#submit").click(function () {
            var password = $("#new_password").val();
            var confirmPassword = $("#confirm_password").val();
            if (password.length<6) {
                alert("password should be minimum 6 character.");
                return false;
            }
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
           
        });
    });
    </script>
    <?php include'footer_script.php';?>
</body>

</html>