<?php 
session_start();
if(!isset($_SESSION['id'])){header("Location:login.php"); exit;}
include'config.php';
if(isset($_POST['submit'])){
     $leave_type =$_POST['leave_type'];
     $description =$_POST['description'];

     $ins_query="insert into leave_type
    (`ltype_name`,`ltype_desc`)values
    ('$leave_type','$description')";
   
    $result = mysqli_query($conn,$ins_query);   
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
                                    <h4 class="card-title">Add Leave Type  </h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-5 control-label col-form-label">Leave Type</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="leave_type" id="leave_type" placeholder="Leave Type" required="" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-5  control-label col-form-label">Descrption</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="description" id="description" placeholder="Descrption" required="" >
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" value="Add" name="submit" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Add Leave Type </h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr NO.
                                                <th>Leave Type </th>
                                                <th>Description  </th>
                                                <th>Creation Date </th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count=1;
                                            $sel_query="Select * from leave_type ORDER BY ltype_id desc;";
                                            $select_result = mysqli_query($conn,$sel_query);
                                            while($row = mysqli_fetch_assoc($select_result)) { ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $row["ltype_name"]; ?></td>
                                                <td><?php echo $row["ltype_desc"]; ?> </td>
                                                <td><?php echo $row["ltype_date"]; ?></td>
                                                <td><a href="leave_type_update.php?id=<?php echo $row["ltype_id"]; ?>" data-toggle="tooltip" data-placement="top" title="Update">
                                                <i class="mdi mdi-check"></i>
                                            </a>
                                            <a href="leave_type_delete.php?id=<?php echo $row["ltype_id"]; ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete?');"data-placement="top" title="Delete">
                                                </i><i class="mdi mdi-close"></i>
                                            </a></td>
                                            </tr>
                                           <?php $count++; } ?>
                                           
                                        </tfoot>
                                    </table>
                                </div>

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
    <?php include'footer_script.php';?>
</body>

</html>