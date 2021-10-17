<?php 
session_start();
if(!isset($_SESSION['id'])){header("Location:login.php"); exit;}
include'config.php';
$query = "SELECT * from department"; 
$select_result = mysqli_query($conn, $query) or die ( mysqli_error());
$name_error = '';
if(isset($_POST['submit'])){

 $target_dir = "upload/";
 $file = $_FILES['my_file']['name'];
 $path = pathinfo($file);
 $filename = rand(1111,9999).time();
 $ext = $path['extension'];
 $temp_name = $_FILES['my_file']['tmp_name'];
 $path_filename_ext = $target_dir.$filename.".".$ext;
 if (file_exists($path_filename_ext)) {
 echo "Sorry, file already exists.";
 }else{
 move_uploaded_file($temp_name,$path_filename_ext);
 /*echo "Congratulations! File Uploaded Successfully.";*/
 }

     $emp_code =$_POST['emp_code'];
     $first_name =$_POST['first_name'];
     $last_name =$_POST['last_name'];
     $department =$_POST['department'];
     $birthdate =$_POST['birthdate'];
     $gender =$_POST['gender'];
     $mobile_no =$_POST['mobile_no'];
     $address =$_POST['address'];
     $email =$_POST['email'];
     $password =$_POST['password'];
     $city =$_POST['city'];
     $country =$_POST['country'];
     $my_file =$filename.".".$ext;

    $select_query = "SELECT * FROM employee WHERE emp_code='$emp_code'";
     $check_result = mysqli_query($conn,$select_query); 
     if (mysqli_num_rows($check_result) > 0) {
      $name_error = "Sorry... Emp Code is already taken";  
    }else{
     $ins_query="insert into employee
    (`emp_code`,`emp_first_name`,`emp_last_name`,`emp_dept`,`emp_birth_date`,`emp_gender`,`emp_mobile`,`emp_address`,`emp_email`,`emp_password`,`emp_city`,`emp_country`,`profile_picture`)values
    ('$emp_code','$first_name','$last_name','$department','$birthdate','$gender','$mobile_no','$address','$email','$password','$city','$country','$my_file')";
    $result = mysqli_query($conn,$ins_query); 
    }
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
                            <form class="form-horizontal" method="post" id="employee_form" enctype="multipart/form-data" >
                                <div class="card-body">
                                    <div class="error-msg"><?php echo $name_error;?></div><br>
                                    <h4 class="card-title">Add Employees </h4>
                                    <div class="form-group row">
                                        <label for="emp_code" class=" control-label col-form-label">Emp. Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="emp_code" class="form-control" id="emp_code" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="first_name" class="control-label col-form-label" >First Name</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="first_name" id="first_name" required="" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                        </div>
                                        <label for="last_name" class="control-label col-form-label">Last Name</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="last_name" id="last_name" required="" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" >
                                        </div>
                                        <label class="control-label col-form-label">Department</label>
                                        <div class="col-md-3">
                                            <select class="form-control custom-select" name="department" required="">
                                                    <option value="">Department</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($select_result)) {
                                                        echo '<option value="'.$row["dept_id"].'">'.$row["dept_name"].'</option>';   
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="control-label col-form-label">Birthdate</label>
                                        <div class="input-group col-sm-3">
                                            <input type="text" class="form-control mydatepicker" placeholder="dd/mm/yyyy" name="birthdate" required="">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                        <label class="control-label col-form-label">Gender:</label>
                                        <div class="col-md-2 radio_btn">
                                             <span class="custom-control custom-radio">
                                                <input type="radio" value="Male" name="gender" class="custom-control-input" id="customControlValidation2" required>
                                                <label class="custom-control-label" for="customControlValidation2">Male</label>
                                            </span>
                                             <span class="custom-control custom-radio female_btn">
                                                <input type="radio" value="Female" class="custom-control-input" id="customControlValidation3"  name="gender" required>
                                                <label class="custom-control-label" for="customControlValidation3">Female</label>
                                            </span>
                                        </div>
                                        <label for="mobile_no" class="control-label col-form-label">Mobile No</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="mobile_no" required="" id="mobile_no" onkeypress="return isNumberKey(event)"  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="control-label col-form-label">Address</label>
                                        <div class="col-sm-5">
                                            <textarea class="form-control" id="address" required="" name="address"></textarea>
                                        </div>

                                        <label for="email" class="control-label col-form-label">Email</label>
                                        <div class="col-sm-5">
                                            <input type="email" class="form-control" required="" id="email" name="email">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                       
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="control-label col-form-label">City/Town</label>
                                           <div class="col-md-3">
                                            <input type="text" class="form-control" required="" id="city"  name="city" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                        </div>
                                        <label for="country" class="control-label col-form-label">Country</label>
                                           <div class="col-md-3">
                                            <input type="text" class="form-control" id="country" required="" name="country" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="control-label col-form-label">Password</label>
                                        <div class="col-sm-3">
                                            <input type="password" class="form-control" name="password" id="password" required="" >
                                        </div>
                                        <label for="confirm_password" class="control-label col-form-label">Confirm Password</label>
                                        <div class="col-sm-3">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required="" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                          Upload image <input type="file" name="my_file" required="">
                                        </div>  
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" id="submit" class="btn btn-primary" value="Add" name="submit">
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

    $(function () {
        $("#submit").click(function () {
            var password = $("#password").val();
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
     function isNumberKey(evt){
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
       return false;
   return true;
}

    </script>
    
</body>

</html>