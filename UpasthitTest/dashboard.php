<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
?>

<?php 
$dataPoints = array( array("label"=>"male", "y"=>64.02), array("label"=>"female", "y"=>12.55), array("label"=>"others", "y"=>8.47))
?>

<!doctype html>
	<html lang="en">
 		<head>
    		<link rel="icon" href="img/favicon.png" type="image/png">
			<title>dashboard</title>
    		<!-- main css -->
	 		<link rel = "stylesheet" href="css/bootstrap.css">
	 		<link rel = "stylesheet" href="css/font-awesome.min.css">
	 		<link rel = "stylesheet" href="vendors/animate.css">
    		<link rel="stylesheet" href="css/style.css">

			<script>
				window.onload = function() 
				{
 					var chart = new CanvasJS.Chart("teachers", {animationEnabled: true, title: { text: "."}, subtitles: [{text: "November 2017"}],
					data: [{ type: "pie", yValueFormatString: "#,##0.00\"%\"", indexLabel: "{label} ({y})", dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>}]
					});
					chart.render();
 				 }
			</script>
			
			<script>
				window.onload = function() 
				{
 					var chart = new CanvasJS.Chart("teachers", {animationEnabled: true, title: { text: "."}, subtitles: [{text: "November 2017"}],
					data: [{ type: "pie", yValueFormatString: "#,##0.00\"%\"", indexLabel: "{label} ({y})", dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>}]
					});
					chart.render();
 				 }
			</script>
</head>

<body>
<?php include_once 'includes/header2.php';?>
<?php
	$sql = "SELECT * from add_new_std";
	$query = $dbh->prepare($sql);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);

	echo "Student's Details <br>";
	$stdCnt = 1;
	if ($query->rowCount() > 0) {
    	foreach ($results as $row) {?>
			<tr>
                <td><?php echo htmlentities($stdCnt); ?></td>
                <td><?php echo htmlentities($row->gender); ?></td>
            </tr>
			<br>
            <?php $stdCnt = $stdCnt + 1;}
		}
		echo $stdCnt-1;
		echo"<br>";
		?>


<?php
	$sql = "SELECT * from add_new_inst";
	$query = $dbh->prepare($sql);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);

	echo "Instructor's Details <br>";
	$insCnt = 1;
	if ($query->rowCount() > 0) {
    	foreach ($results as $row) {?>
			<tr>
                <td><?php echo htmlentities($insCnt); ?></td>
                <td><?php echo htmlentities($row->gender); ?></td>
            </tr>
			<br>
            <?php $insCnt = $insCnt + 1;}
		}
		echo $insCnt-1;
		echo"<br>";
		?>


<div id="teachers" style="height: 500px; width: 40%; "></div>
<div id="teachers" style="height: 500px; width: 40%;"></div>

	<script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
	<script src="js/canvasjs.min.js"></script>
</body>
</html>
