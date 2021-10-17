<?php 
$page = "apply_leave" ;
session_start();
if(!isset($_SESSION['emp_id'])){header("Location:login.php"); exit;}
include'config.php';
$query = "SELECT * from leave_type"; 
$select_result = mysqli_query($conn, $query) or die ( mysqli_error());

if(isset($_POST['submit'])){
     $leave_type =$_POST['leave_type'];
     $from_date =$_POST['from_date'];
     $to_date =$_POST['to_date'];
     $description =$_POST['description'];
     $nature_of_leave =$_POST['nature_of_leave'];

     $ins_query="insert into leave_request
    (`req_emp_id`,`req_leave_type`,`nature_of_leave`,`req_from_date`,`req_to_date`,`req_desc`,`req_date`)values
    ('".$_SESSION["emp_id"]."','$leave_type','$nature_of_leave','$from_date','$to_date','$description','".date('Y-m-d H:i:s')."')";
    $result = mysqli_query($conn,$ins_query); 
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
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" method="post" id="employee_form">
                                <div class="card-body">
                                    <h4 class="card-title">Apply For Leave </h4>
                                    
                                    <div class="form-group row">
                                        <label class="control-label col-form-label">Leave Type</label>
                                        <div class="col-md-3">
                                            <select class="form-control custom-select" name="leave_type" required="">
                                                    <option value="">Select Leave Type</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($select_result)) {
                                                        echo '<option value="'.$row["ltype_id"].'">'.$row["ltype_name"].'</option>';   
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                        <label class="control-label col-form-label">Nature of leave</label>
                                        <div class="col-md-3">
                                            <select class="form-control custom-select" name="nature_of_leave">
                                                <option>Select Nature of leave</option>
                                                <option value="Half Leave">Half Leave</option>
                                                <option value="Full Leave">Full Leave</option>
                                               
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="control-label col-form-label">From Date</label>
                                        <div class="input-group col-sm-3">
                                            <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="from_date" required="" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                        <label class="control-label col-form-label">To Date</label>
                                        <div class="input-group col-sm-3">
                                            <input type="text" class="form-control mydatepicker" placeholder="dd/mm/yyyy" name="to_date" required="" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="control-label col-form-label">Description</label>
                                        <div class="col-md-3">
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" id="submit" class="btn btn-primary" value="Apply" name="submit">
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
