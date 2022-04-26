<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
?>

<!doctype html>
<html lang="en">
 <head>
    <link rel="icon" href="img/favicon.png" type="image/png">
	<title>Student Details</title>
    <!-- main css -->
	 <link rel = "stylesheet" href="css/bootstrap.css">
	 <link rel = "stylesheet" href="css/font-awesome.min.css">
	 <link rel = "stylesheet" href="vendors/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">

    table {
      border-collapse: collapse;
    }

    td {
      border: 1px solid orange;
    }

    th {
      color:#000;
      border: 1px solid orange;
      font-weight:bold;
      font-size:20px;
      text-align: center;
    }
  </style>
</head>

<body>
<?php include_once 'includes/header2.php';?>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header"> <strong class="card-title"><h4>Student's details</h4></strong></div>

          <div class="card-body">
            <table class="table">
             <thead>
              <tr>
               <tr>
                  <th>S. no.</th>
                  <th>Unique&nbspId</th>
                  <th>First&nbspName</th>
                  <th>Last&nbspName</th>
                  <th>School&nbsp;Name</th>
                  <th>Class</th>
                  <th>Roll</th>
                  <th>Gender</th>
                  <th>Father's&nbspName</th>
                  <th>Mother's&nbspName</th>
                  <th>DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>Action</th>
                </tr>
               </tr>
            </thead>
            
<?php
$sql = "SELECT * from add_new_std";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $row) {?>

                <tr>
                  <td><?php echo htmlentities($cnt); ?></td>
                  <td><?php echo htmlentities($row->uniqueId); ?></td>
                  <td><?php echo htmlentities($row->firstName); ?></td>
                  <td><?php echo htmlentities($row->lastName); ?></td>
                  <td><?php echo htmlentities($row->school); ?></td>
                  <td><?php echo htmlentities($row->class); ?></td>
                  <td><?php echo htmlentities($row->roll); ?></td>
                  <td><?php echo htmlentities($row->gender); ?></td>
                  <td><?php echo htmlentities($row->fatherName); ?></td>
                  <td><?php echo htmlentities($row->motherName); ?></td>
                  <td><?php echo htmlentities($row->dateOfBirth); ?></td>
                  <td><a href="updateStudent.php?unique =<?php echo htmlentities($row->uniqueId);?>">Update</a>&nbsp;&nbsp;&nbsp;<a href="deleteStudent.php?unique=<?php echo htmlentities($row->uniqueId);?>">Delete</a></td>
                </tr>
               <?php $cnt = $cnt + 1;}}?>

              </table>
            </div>
          </div>
        </div>

    </div>
	 <?php //include_once 'includes/footer.php';?>

    <!--================ End footer Area  =================-->

    <!--================Contact Success and Error message Area =================-->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/counter-up/jquery.counterup.js"></script>
    <script src="js/mail-script.js"></script>
    <!--gmaps Js--> 
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>