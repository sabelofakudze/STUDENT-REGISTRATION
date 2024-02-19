<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
 $Maths=$_POST['Maths'];
 $English=$_POST['English'];
 $Siswati=$_POST['Siswati'];
 $Physics=$_POST['Physics'];
 $Bio=$_POST['Bio'];
 $Agriculture=$_POST['Agriculture'];
 $addMaths=$_POST['addMaths'];
$section=$_POST['section'];
$sql="insert into tblresult(Maths,English,Siswati,Physics,Bio,Agriculture,addMaths,studentID)values(:Maths,:English,:Siswati,:Physics,:Bio,:Agriculture,:addMaths,:section)";
$query=$dbh->prepare($sql);

$query->bindParam(':Maths',$Maths,PDO::PARAM_STR);
$query->bindParam(':English',$English,PDO::PARAM_STR);
$query->bindParam(':Siswati',$Siswati,PDO::PARAM_STR);
$query->bindParam(':Physics',$Physics,PDO::PARAM_STR);
$query->bindParam(':Bio',$Bio,PDO::PARAM_STR);
$query->bindParam(':Agriculture',$Agriculture,PDO::PARAM_STR);
$query->bindParam(':addMaths',$addMaths,PDO::PARAM_STR);
$query->bindParam(':section',$section,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Results has been added.")</script>';
echo "<script>window.location.href ='add-result.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Student  Management System|| Add Class</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add Results </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Results</li>
                </ol>
              </nav>
            </div>
            <div class="row">

              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Result</h4>

                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Select Student</label>
                        <select  name="section" class="form-control" required='true'>
                          <option value="">Choose Student</option>
                          <?php

 $sql2 = "SELECT * from    tblstudent";
 $query2 = $dbh -> prepare($sql2);
 $query2->execute();
 $result2=$query2->fetchAll(PDO::FETCH_OBJ);

 foreach($result2 as $row1)
 {
     ?>
 <option value="<?php echo htmlentities($row1->StuID);?>">Student ID:<?php echo htmlentities($row1->StuID);?> Class: <?php echo htmlentities($row1->StudentClass);?></option>
  <?php } ?>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Maths</label>
                        <input type="text" name="Maths" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">English</label>
                        <input type="text" name="English" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Siswati</label>
                        <input type="text" name="Siswati" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Physics</label>
                        <input type="text" name="Physics" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Bio</label>
                        <input type="text" name="Bio" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Agriculture</label>
                        <input type="text" name="Agriculture" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Add Maths</label>
                        <input type="text" name="addMaths" value="" class="form-control" required='true'>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>
