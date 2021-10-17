<?php
$page = "home" ;
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
                    <div class="col-md-6">
                        <div class="card">
                           <table class="emp_data_table">
                               <tr>
                                   <th>Emp Code</th>
                                   <td><?php echo $emp_row['emp_code']; ?></td>
                               </tr>
                               <tr>
                                   <th>First Name</th>
                                   <td><?php echo $emp_row['emp_first_name']; ?></td>
                               </tr>
                               <tr>
                                   <th>Last Name</th>
                                   <td><?php echo $emp_row['emp_last_name']; ?></td>
                               </tr>
                               <tr>
                                   <th>Department</th>
                                   <td><?php echo $emp_row['dept_name']; ?></td>
                               </tr>
                               <tr>
                                   <th>Birthdate</th>
                                   <td><?php echo $emp_row['emp_birth_date']; ?></td>
                               </tr>
                               <tr>
                                   <th>Gender</th>
                                   <td><?php echo $emp_row['emp_gender']; ?></td>
                               </tr>
                           </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                           <table class="emp_data_table">
                               <tr>
                                   <th>Mobile No</th>
                                   <td><?php echo $emp_row['emp_mobile']; ?></td>
                               </tr>
                               <tr>
                                   <th>Address</th>
                                   <td><?php echo $emp_row['emp_address']; ?></td>
                               </tr>
                               <tr>
                                   <th>Email</th>
                                   <td><?php echo $emp_row['emp_email']; ?></td>
                               </tr>
                               <tr>
                                   <th>City</th>
                                   <td><?php echo $emp_row['emp_city']; ?></td>
                               </tr>
                               <tr>
                                   <th>Country</th>
                                   <td><?php echo $emp_row['emp_country']; ?></td>
                               </tr>
                               <tr>
                                   <th>Password</th>
                                   <td><?php echo $emp_row['emp_password']; ?></td>
                               </tr>
                           </table>
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
