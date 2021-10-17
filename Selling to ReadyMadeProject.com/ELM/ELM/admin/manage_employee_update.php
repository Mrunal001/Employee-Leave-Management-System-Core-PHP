<?php 
session_start();
if(!isset($_SESSION['id'])){header("Location:login.php"); exit;}
include'config.php';
$id=$_REQUEST['id'];
$query = "SELECT * from employee where emp_id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$query = "SELECT * from department"; 
$select_result = mysqli_query($conn, $query) or die ( mysqli_error());


if(isset($_POST['submit'])){
     $emp_code =$_POST['emp_code'];
     $first_name =$_POST['first_name'];
     $last_name =$_POST['last_name'];
     $department =$_POST['department'];
     $birthdate =$_POST['birthdate'];
     $gender =$_POST['gender'];
     $mobile_no =$_POST['mobile_no'];
     $address =$_POST['address'];
     $email =$_POST['email'];
     $city =$_POST['city'];
     $country =$_POST['country'];
     $status =$_POST['status'];

    $update="update employee set emp_code='".$emp_code."',
emp_first_name='".$first_name."', emp_last_name='".$last_name."', emp_dept='".$department."', emp_birth_date='".$birthdate."', emp_gender='".$gender."', emp_mobile='".$mobile_no."', emp_address='".$address."', emp_email='".$email."', emp_city='".$city."', emp_country='".$country."', emp_status='".$status."'where emp_id='".$id."'";
    $result = mysqli_query($conn,$update); 
    header("Location: manage_employee.php"); 
exit;
}
?><!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
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
                        <h4 class="page-title">Form Basic</h4>
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
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" method="post" id="employee_form">
                                <div class="card-body">
                                    <h4 class="card-title">Add Employees </h4>
                                    <div class="form-group row">
                                         <input name="id" type="hidden" value="<?php echo $row['emp_id'];?>" />
                                        <label for="emp_code" class=" control-label col-form-label">Emp. Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="emp_code" class="form-control" id="emp_code" value="<?php echo $row['emp_code'];?>" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="first_name" class="control-label col-form-label">First Name</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $row['emp_first_name'];?>" required="" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" >
                                        </div>
                                        <label for="last_name" class="control-label col-form-label">Last Name</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $row['emp_last_name'];?>" required=""  onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" >
                                        </div>
                                        <label class="control-label col-form-label">Department</label>
                                        <div class="col-md-3">
                                            <select class="form-control custom-select" name="department" required="">
                                                    <option value="">Department</option>
                                                    <?php
                                                    while ($row1 = mysqli_fetch_assoc($select_result)) {
                                                        if($row1["dept_id"] == $row["emp_dept"]){
                                                            echo '<option value="'.$row1["dept_id"].'" selected="selected">'.$row1["dept_name"].'</option>';   
                                                        }else{
                                                            echo '<option value="'.$row1["dept_id"].'">'.$row1["dept_name"].'</option>';   
                                                        }
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="control-label col-form-label">Birthdate</label>
                                        <div class="input-group col-sm-3">
                                            <input type="text" class="form-control mydatepicker" placeholder="dd/mm/yyyy" value="<?php echo $row['emp_birth_date'];?>" name="birthdate" required="">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                        <label class="control-label col-form-label">Gender:</label>
                                        <div class="col-md-2 radio_btn">
                                             <span class="custom-control custom-radio">
                                                <input type="radio" value="Male" name="gender" class="custom-control-input" id="customControlValidation2" required <?php echo (($row["emp_gender"] == 'Male') ? 'checked' : '') ?>>
                                                <label class="custom-control-label" for="customControlValidation2">Male</label>
                                            </span>
                                             <span class="custom-control custom-radio female_btn">
                                                <input type="radio" value="Female" class="custom-control-input" id="customControlValidation3"  name="gender" required <?php echo (($row["emp_gender"] == 'Female') ? 'checked' : '') ?>>
                                                <label class="custom-control-label" for="customControlValidation3">Female</label>
                                            </span>
                                        </div>
                                        <label for="mobile_no" class="control-label col-form-label">Mobile No</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="mobile_no" required="" value="<?php echo $row['emp_mobile'];?>" id="mobile_no" onkeypress="return isNumberKey(event)" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="control-label col-form-label">Address</label>
                                        <div class="col-sm-5">
                                            <textarea class="form-control" id="address" required="" name="address"><?php echo $row['emp_address'];?></textarea>
                                        </div>

                                        <label for="email" class="control-label col-form-label">Email</label>
                                        <div class="col-sm-5">
                                            <input type="email" class="form-control" required="" id="email" name="email" value="<?php echo $row['emp_email'];?>">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                       
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="control-label col-form-label">City/Town</label>
                                           <div class="col-md-3">
                                            <input type="text" class="form-control" required="" id="city"  name="city" value="<?php echo $row['emp_city'];?>" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" >
                                        </div>
                                        <label for="country" class="control-label col-form-label">Country</label>
                                           <div class="col-md-3">
                                            <input type="text" class="form-control" id="country" required="" name="country" value="<?php echo $row['emp_country'];?>" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" >
                                        </div>
                                    </div>
                                    <label class="control-label col-form-label">Status:</label>
                                        <div class="col-md-2 radio_btn">
                                             <span class="custom-control custom-radio">
                                                <input type="radio" value="1" name="status" class="custom-control-input" id="active" required <?php echo (($row["emp_status"] == '1') ? 'checked' : '') ?>>
                                                <label class="custom-control-label" for="active">Active</label>
                                            </span>
                                             <span class="custom-control custom-radio female_btn">
                                                <input type="radio" value="0" class="custom-control-input" id="deactive"  name="status" required <?php echo (($row["emp_status"] == '0') ? 'checked' : '') ?>>
                                                <label class="custom-control-label" for="deactive">Deactive</label>
                                            </span>
                                        </div>
                                    <!-- <div class="form-group row">
                                        <label for="password" class="control-label col-form-label">Password</label>
                                        <div class="col-sm-3">
                                            <input type="password" class="form-control" name="password" id="password" required="" >
                                        </div>
                                        <label for="confirm_password" class="control-label col-form-label">Confirm Password</label>
                                        <div class="col-sm-3">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required="" >
                                        </div>
                                    </div> -->
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" id="submit" class="btn btn-primary" value="Edit" name="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
                <!-- editor -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
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

   <?php include'footer_script.php';?>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker({format:'dd/mm/yyyy'});
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
    function isNumberKey(evt){
       var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
           return false;
       return true;
    }      
    </script>
</body>

</html>