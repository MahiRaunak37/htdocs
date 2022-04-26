<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {

var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title: {
		text: "Student Details"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 79.45, label: "Male"},
			{y: 7.31, label: "female"},
			{y: 7.06, label: "others"}
			
		]
	}]
});

var chart2 = new CanvasJS.Chart("chartContainer2", {
    backgroundColor:null,
	animationEnabled: true,
	title: {
		text: "Teacher's Details"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 79.45, label: "Male"},
			{y: 7.31, label: "Female"},
			{y: 7.06, label: "Others"}		
		]
	}]
});
chart1.render();
chart2.render();

}
</script>
</head>
<body>
<div style="float:right;">	
	<div id="chartContainer1" style="height: 250px; max-width: 20%;"></div>
	<div id="chartContainer2" style="height: 250px; max-width: 20%;"></div>
</div>
<script src="js/canvasjs.min.js"></script>
</body>
</html>