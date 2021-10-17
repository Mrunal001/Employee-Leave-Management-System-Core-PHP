<?php 
session_start();
if(!isset($_SESSION['id'])){header("Location:login.php"); exit;}
include'config.php';
$id=$_REQUEST['id'];
$query = "SELECT * from department where dept_id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$status = "";

if(isset($_POST['submit']))
{
$id=$_REQUEST['id'];
$department_name =$_REQUEST['department_name'];
$department_short_name =$_REQUEST['department_short_name'];
$department_code = $_REQUEST["department_code"];
$update="update department set dept_name='".$department_name."',
dept_sort_name='".$department_short_name."', dept_code='".$department_code."'where dept_id='".$id."'";

$strore = mysqli_query($conn, $update) or die(mysqli_error());
  /*
$status = "Record Updated Successfully. </br></br>
<a href='department.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';*/

header("Location:department.php"); 
exit;
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
                    <div class="col-md-7">
                       
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Department </h4>
                                    <div class="form-group row">
                                       
                                        <input name="id" type="hidden" value="<?php echo $row['dept_id'];?>" />
                                        <label for="fname" class="col-sm-5 control-label col-form-label">Department Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="department_name" class="form-control" id="department_name" placeholder="Department Name" value="<?php echo $row['dept_name'];?>" required="" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-5  control-label col-form-label">Department Short Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="department_short_name" class="form-control" id="department_short_name" placeholder="Department Short Name" required="" value="<?php echo $row['dept_sort_name'];?>" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" >
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-5  control-label col-form-label">Department Code</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="department_code" class="form-control" id="department_code"  value="<?php echo $row['dept_code'];?>" placeholder="Department Code" required="" onkeypress="return isNumberKey(event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" name="submit" value="Edit" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            
                            </div>
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
   <?php include 'footer_script.php'; ?>
   <script type="text/javascript">function isNumberKey(evt){
       var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
           return false;
       return true;
    }</script>
</body>

</html>