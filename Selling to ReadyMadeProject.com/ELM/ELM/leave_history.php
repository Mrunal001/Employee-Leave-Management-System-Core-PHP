<?php 
$page = "leave_history" ;
session_start();
if(!isset($_SESSION['emp_id'])){header("Location:login.php"); exit;}
include'config.php'; 
//$id=$_POST['emp_id'];
$query = "SELECT * from employee,department where dept_id = emp_dept AND emp_id='".$_SESSION['emp_id']."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$emp_row = mysqli_fetch_assoc($result);
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
                            <div class="card-body">
                                <h5 class="card-title">Leave History</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr NO.
                                                <th>Emp. Name</th>
                                                <th>Leave Type </th>
                                                <th>Nature of leave</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Description</th>
                                                <th>Posting Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                            $count=1;
                                            $sel_query="Select * from leave_request,employee,leave_type WHERE emp_id = req_emp_id AND req_leave_type = ltype_id AND req_emp_id = '".$_SESSION['emp_id']."'ORDER BY req_date desc";
                                            $select_result = mysqli_query($conn,$sel_query);
                                            while($row = mysqli_fetch_assoc($select_result)) { ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $row["emp_first_name"] . ' '. $row["emp_last_name"]; ?></td>
                                                <td><?php echo $row["ltype_name"]; ?></td>
                                                <td><?php echo $row["nature_of_leave"]; ?></td>
                                                <td><?php echo $row["req_from_date"]; ?></td>
                                                <td><?php echo $row["req_to_date"]; ?></td>
                                                <td><?php echo $row["req_desc"]; ?></td>
                                                <td><?php echo $row["req_date"]; ?></td>
                                                <td style="width: 200px;">
                                                    <?php 
                                                        if($row["req_status"] == 0){
                                                            echo "<span class='status_deactive'>Not Approved</span>";

                                                        }else if($row["req_status"] == 1){
                                                             echo "<span class='status_active'> Approve</span>";
                                                        
                                                        }else{
                                                             echo "<span class='status_pending'>Pending Approval</span>";
                                                        }

                                                    ?>
                                                        
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
