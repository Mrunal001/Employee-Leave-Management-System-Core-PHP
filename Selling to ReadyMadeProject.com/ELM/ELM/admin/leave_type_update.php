<?php 
session_start();
if(!isset($_SESSION['id'])){header("Location:login.php"); exit;}
include'config.php';
$id=$_REQUEST['id'];
$query = "SELECT * from leave_type where ltype_id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit']))
{
$id=$_REQUEST['id'];
$leave_type =$_REQUEST['leave_type'];
$description =$_REQUEST['description'];

$update="update leave_type set ltype_name='".$leave_type."',
ltype_desc='".$description."' where ltype_id='".$id."'";

$strore = mysqli_query($conn, $update) or die(mysqli_error());
  
/*$status = "Record Updated Successfully. </br></br>
<a href='leave_type.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';*/

header("Location:leave_type.php"); 
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
                    <div class="col-md-5">
                        <div class="card">
                           
                            <form class="form-horizontal" method="POST">
                                <div class="card-body">

                                    <h4 class="card-title">Edit Leave Type  </h4>

                                    <div class="form-group row">
                                         <input name="id" type="hidden" value="<?php echo $row['ltype_id'];?>" />
                                        <label for="fname" class="col-sm-5 control-label col-form-label">Leave Type</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="<?php echo $row['ltype_name'];?>"  class="form-control" name="leave_type" id="leave_type" placeholder="Leave Type" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-5  control-label col-form-label">Descrption</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?php echo $row['ltype_desc'];?>" name="description" id="description" placeholder="Descrption">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" value="Edit" name="submit" class="btn btn-primary">
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
    <?php include'footer_script.php';?>
</body>

</html>