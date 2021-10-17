<?php 
session_start();
if(!isset($_SESSION['id'])){header("Location:login.php"); exit;}
include'config.php'; 
?><!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Dashboard</title>
    <?php include 'head.php'; ?>
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
        <?php include 'header.php'; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'sidebar.php' ?>
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
                        <h4 class="page-title">Dashboard</h4>
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
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">Dashboard</h6>
                            </div>
                        </div>
                    </div> -->
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                <?php 
                                $count_query = "SELECT COUNT(emp_id) as user FROM employee";
                                $result = mysqli_query($conn,$count_query);
                                $row = mysqli_fetch_assoc( $result );?>

                               <h1 class="dashboard_heading"><?php echo $row["user"]; ?></h1>
                               <h6 class="text-white">Total Regd. Emp</h6>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                <?php 
                                $count_query = "SELECT COUNT(dept_id) as user FROM department";
                                $result = mysqli_query($conn,$count_query);
                                $row = mysqli_fetch_assoc( $result );?>

                               <h1 class="dashboard_heading"><?php echo $row["user"]; ?></h1>
                               <h6 class="text-white">Listed Dept.</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                <?php 
                                $count_query = "SELECT COUNT(ltype_id) as user FROM leave_type";
                                $result = mysqli_query($conn,$count_query);
                                $row = mysqli_fetch_assoc( $result );?>

                               <h1 class="dashboard_heading"><?php echo $row["user"]; ?></h1>
                                <h6 class="text-white">Listed Leave Type</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    
                    
                    
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Latest Leave Applications</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr NO.
                                                <th>Emp. Name</th>
                                                <th>Leave Type</th>
                                                <th>Nature of leave</th>
                                                <th>From Dtae</th>
                                                <th>To Date</th>
                                                <th>Posting Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                            $count=1;
                                            $sel_query="Select * from leave_request,employee,leave_type WHERE emp_id = req_emp_id AND req_leave_type = ltype_id AND req_status= 2 ORDER BY req_date desc;";
                                            $select_result = mysqli_query($conn,$sel_query);
                                            while($row = mysqli_fetch_assoc($select_result)) { ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $row["emp_first_name"] . ' '. $row["emp_last_name"]; ?></td>
                                                <td><?php echo $row["ltype_name"]; ?></td>
                                                <td><?php echo $row["nature_of_leave"]; ?></td>
                                                <td><?php echo $row["req_from_date"]; ?></td>
                                                <td><?php echo $row["req_to_date"]; ?></td>
                                                <td><?php echo $row["req_date"]; ?></td>
                                                <td width="200px;"><?php echo "<span class='status_pending'>Pending </span>";?>
                                                </td>
                                                <td width="300px;"><a href="leave_status_code.php?id=<?php echo $row["req_id"]; ?>&type=1&page=index" class="approved_btn" name="approved">Approved</a>
                                                    <a href="leave_status_code.php?id=<?php echo $row["req_id"]; ?>&type=0&page=index" class="not_approved_btn">Not Approved</a>
                                                </td>
                                            </tr>
                                           <?php $count++; } ?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
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
    </script>
</body>

</html>