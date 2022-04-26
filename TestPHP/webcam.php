<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		How to Integrate Webcam using
		JavaScript on HTML5 ?
	</title>
	<link rel="stylesheet" href="css/style.css">
	<link href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			rel="stylesheet">

	<script src=
"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"
	type="text/javascript">

	</script>

	<script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
	</script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<h5 class="card-header h5 text-center">
						HTML 5 & JS live Cam
					</h5>
					<div class="card-body">
						<div class="booth">
							<video id="video" width="100%"
								height="100%" autoplay>
							</video>
						</div>

						<div class="text-right">
							<a href="#!" class="btn btn-danger"
								onClick="stop()">
								Stop Cam
							</a>
							<a href="#!" class="btn btn-success"
								onClick="start()">
								Start Cam
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		var stop = function () {
			var stream = video.srcObject;
			var tracks = stream.getTracks();
			for (var i = 0; i < tracks.length; i++) {
				var track = tracks[i];
				track.stop();
			}
			video.srcObject = null;
		}
		var start = function () {
			var video = document.getElementById('video'),
				vendorUrl = window.URL || window.webkitURL;
			if (navigator.mediaDevices.getUserMedia) {
				navigator.mediaDevices.getUserMedia({ video: true })
					.then(function (stream) {
						video.srcObject = stream;
					}).catch(function (error) {
						console.log("Something went wrong!");
					});
			}
		}
		$(function () {
			start();
		});
	</script>
</body>

</html>
