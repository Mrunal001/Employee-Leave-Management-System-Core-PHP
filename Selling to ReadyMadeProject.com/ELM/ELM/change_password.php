<?php 
session_start();
if(!isset($_SESSION['emp_id'])){header("Location:login.php"); exit;}
include'config.php';
$error = '';
$success = '';
if(isset($_POST['submit'])){
     $old_password =$_POST['old_password'];
     $new_password =$_POST['new_password'];
    // $confirm_password =$_POST['confirm_password'];
     $emp_id = $_SESSION['emp_id'];
     $query = "SELECT * FROM employee where emp_password='$old_password' AND emp_id='$emp_id'";

     $sql=mysqli_query($conn,$query);
$num=mysqli_fetch_array($sql);
if($num>0){
    $con=mysqli_query($conn,"update employee set emp_password='$new_password' where emp_id='$emp_id'");
    $success="Password Changed Successfully !!";
}
else
{
$error="Old Password not match !!";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include'head.php'; ?>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php include'sidebar.php';?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

     <?php include'top_bar.php';?>

      <div class="container-fluid">
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
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <?php include'footer_script.php';?>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
