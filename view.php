<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Mendeley Publication Visualization</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			body, html {
				margin:0;
				padding:0;
				font-family:Arial;
			}
			h1 {
				margin-bottom:10px;
			}
			#main {
				position:relative;
				width:1020px;
				padding:20px;
				margin:auto;
			}
			#heatmapArea {
				position:relative;
				float:left;
				width:800px;
				height:600px;
				border:1px dashed black;
			}
			#configArea {
				position:relative;
				float:left;
				width:200px;
				padding:15px;
				padding-top:0;
				padding-right:0;
			}
			.btn {
				margin-top:25px;
				padding:10px 20px 10px 20px;
				-moz-border-radius:15px;
				-o-border-radius:15px;
				-webkit-border-radius:15px;
				border-radius:15px;
				border:2px solid black;
				cursor:pointer;
				color:white;
				background-color:black;
			}
			textarea{
				width:260px;
				padding:10px;
				height:200px;
			}
			h2{
				margin-top:0;
			}
		</style>
<!--<link rel="shortcut icon" type="image/png" href="http://www.patrick-wied.at/img/favicon.png" />-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

</head>
<body>
<div id="main">
			<h1>Mendeley Publication Visualization</h1>
			<div id="heatmapArea">
			
			</div>
<!--			<div id="configArea">
				<h2>Sidenotes</h2>
				This is a demonstration of a canvas heatmap gmaps overlay<br /><br />
				<strong>Note: this is an early release of the heatmap layer. Please feel free to <a href="https://github.com/pa7/heatmap.js" target="_blank">contribute patches</a>. (e.g: correct datapoint pixels after dragrelease (in draw))</strong>
				<div id="tog" class="btn">Toggle HeatmapOverlay</div>
				<div id="gen" class="btn">Add 5 random lat/lng coordinates</div>
			</div>
			
<div style="position:absolute;width:940px;top:750px;text-align:center;"><a href="http://www.patrick-wied.at/static/heatmapjs/">heatmap.js</a> by <a href="http://www.patrick-wied.at" target="_blank">Patrick Wied</a></div>
-->
</div>
<script type="text/javascript" src="mendeley-visualization/src/heatmap.js"></script>
<script type="text/javascript" src="mendeley-visualization/src/heatmap-gmaps.js"></script>


<?php
function make_testData()
{
	$paperId = $_GET["paperid"];
	$con = mysql_connect("localhost","root","abc");

	if (!$con)
	{	
	  return "";
	}
	mysql_select_db("heatmap", $con);

	$result = mysql_query("SELECT locations FROM heatmap where paperId = " . $paperId);
	$row = mysql_fetch_row($result);
	
	mysql_close($con);
	return $row[0];

//      return "{max: 46, data: [{lat: 33.5363, lng:-117.044, count: 46},{lat: 33.5608, lng:-117.24, count: 1},{lat: 38, lng:-97, count: 1},{lat: 38.9358, lng:-77.1621, count: 1},{lat: 38, lng:-97, count: 2},{lat: 54, lng:-2, count: 1},{lat: 51.5167, lng:-0.7, count: 2},{lat: 51.5167, lng:-0.7, count: 6},{lat: 60.3911, lng:5.3247, count: 1},{lat: 50.8333, lng:12.9167, count: 9},{lat: 50.8333, lng:12.9167, count: 1},{lat: 52.0833, lng:4.3, count: 3},{lat: 52.0833, lng:4.3, count: 1},{lat: 51.8, lng:4.4667, count: 16},{lat: 51.8, lng:4.4667, count: 9},{lat: 51.8, lng:4.4667, count: 2},{lat: 51.1, lng:6.95, count: 1},{lat: 13.75, lng:100.517, count: 1},{lat: 18.975, lng:72.8258, count: 1},{lat: 2.5, lng:112.5, count: 2},{lat: 25.0389, lng:102.718, count: 1},{lat: -27.6167, lng:152.733, count: 1},{lat: -33.7667, lng:150.833, count: 1},{lat: -33.8833, lng:151.217, count: 2},{lat: 9.4333, lng:99.9667, count: 1},{lat: 33.7, lng:73.1667, count: 1},{lat: 33.7, lng:73.1667, count: 2},{lat: 22.3333, lng:114.2, count: 1},{lat: 37.4382, lng:-84.051, count: 1},{lat: 34.6667, lng:135.5, count: 1},{lat: 37.9167, lng:139.05, count: 1},{lat: 36.3214, lng:127.42, count: 1},{lat: -33.8, lng:151.283, count: 2},{lat: -33.8667, lng:151.225, count: 1},{lat: -37.65, lng:144.933, count: 2},{lat: -37.7333, lng:145.267, count: 1},{lat: -34.95, lng:138.6, count: 1},{lat: -27.5, lng:153.017, count: 1},{lat: -27.5833, lng:152.867, count: 3},{lat: -35.2833, lng:138.55, count: 1},{lat: 13.4443, lng:144.786, count: 2},{lat: -37.8833, lng:145.167, count: 1},{lat: -37.86, lng:144.972, count: 1},{lat: -27.5, lng:153.05, count: 1},{lat: 35.685, lng:139.751, count: 2},{lat: -34.4333, lng:150.883, count: 2},{lat: 14.0167, lng:100.733, count: 2},{lat: 13.75, lng:100.517, count: 5},{lat: -31.9333, lng:115.833, count: 1},{lat: -33.8167, lng:151.167, count: 1},{lat: -37.9667, lng:145.117, count: 1},{lat: -37.8333, lng:145.033, count: 1},{lat: -37.6417, lng:176.186, count: 2},{lat: -37.6861, lng:176.167, count: 1},{lat: -41.2167, lng:174.917, count: 1},{lat: 39.0521, lng:-77.015, count: 3},{lat: 24.8667, lng:67.05, count: 1},{lat: 24.9869, lng:121.306, count: 1},{lat: 53.2, lng:-105.75, count: 4},{lat: 44.65, lng:-63.6, count: 1},{lat: 53.9667, lng:-1.0833, count: 1},{lat: 40.7, lng:14.9833, count: 1},{lat: 37.5331, lng:-122.247, count: 1},{lat: 39.6597, lng:-86.8663, count: 2},{lat: 33.0247, lng:-83.2296, count: 1},{lat: 34.2038, lng:-80.9955, count: 1},{lat: 28.0087, lng:-82.7454, count: 1},{lat: 44.6741, lng:-93.4103, count: 1},{lat: 31.4507, lng:-97.1909, count: 1},{lat: 45.61, lng:-73.84, count: 1},{lat: 49.25, lng:-122.95, count: 1},{lat: 49.9, lng:-119.483, count: 2},{lat: 32.7825, lng:-96.8207, count: 6},{lat: 32.7825, lng:-96.8207, count: 7},{lat: 32.7825, lng:-96.8207, count: 4},{lat: 32.7825, lng:-96.8207, count: 41},{lat: 32.7825, lng:-96.8207, count: 11},{lat: 32.7825, lng:-96.8207, count: 3},{lat: 32.7825, lng:-96.8207, count: 10},{lat: 32.7825, lng:-96.8207, count: 5}]}";
}
?>


<script type="text/javascript">

window.onload = function(){

	var myLatlng = new google.maps.LatLng(48.3333, 16.35);
	// sorry - this demo is a beta
	// there is lots of work todo
	// but I don't have enough time for eg redrawing on dragrelease right now
	var myOptions = {
	  zoom: 2,
	  center: myLatlng,
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  disableDefaultUI: true,
	  scrollwheel: false,
	  draggable: false,
	  navigationControl: false,
	  mapTypeControl: false,
	  scaleControl: false,
	  disableDoubleClickZoom: true
	};
	var map = new google.maps.Map(document.getElementById("heatmapArea"), myOptions);
	
	var heatmap = new HeatmapOverlay(map, {"radius":15, "visible":true, "opacity":60});
	



	
	var testData = <?php echo make_testData();?>;
//	console.log(eval("{max: 46, data: [{lat: 33.5363, lng:-117.044, count: 46}]}"));
//	var testData = {max: 100,
//		data: [
//			{"lat":100,"lng":100,"count":100}
//		]
//		
//	};
	
	// this is important, because if you set the data set too early, the latlng/pixel projection doesn't work
	google.maps.event.addListenerOnce(map, "idle", function(){
		heatmap.setDataSet(testData);
	});
	
};

</script>
</body>
</html>
