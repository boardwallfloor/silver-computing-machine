<!Doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Weather Checks</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="https://i.imgur.com/83F1Z87.png" type="image/x-icon">
<!-- Align form to center -->
<style>
.show{
	margin: auto;
	width: 50%;
	text-align:center;
	padding: 10px;
}
</style>

</head>
<body>

<!-- div for the entire thing -->
<div class="show">
<!-- api request -->
<?php
if(isset($_GET['q']) && !empty($_GET['q'])){
$xml=simplexml_load_file("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['q']."&appid=e78841739366dfaa4ed3e28c6b3b4afb");

}
?>
<form method="get">
<fieldset>
<!-- input of city -->
<input type="text" name="q"
placeholder="City here">

<!-- show requested city data -->
<button>Get Weather</button><br>
<img src="http://openweathermap.org/img/w/<?php echo @$xml->weather['icon'];?>.png"><br>
Country : <?php echo @$xml->city['country'] ; ?>	
Weather :<?php echo @$xml->weather['value'] ; ?><br>
Wind :<?php echo @$xml->wind->speed['value'] ; ?> m/s<br>
Pressure :<?php echo @$xml->pressure['value'] ; ?> hPa<br>
Humidity :<?php echo @$xml->humidity['value'] ; ?> % <br>
Temperature :<?php echo @$xml->temperature['value']-273.15 ; ?> C</br>
Cloudiness :<?php echo @$xml->clouds['name'] ; ?></br>
Data Last Updated</br>
<?php echo @$xml->lastupdate['value'] ; ?>
</form>
</div>
</body>
</html>