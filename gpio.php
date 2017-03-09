<html>
<head>
<title>gpio Steuerung</title>
<style>
header {
	font-size: 30px;
	text-align: center;
}

div {
	margin: 15px;
}

.links {
	width: 25px;
	position: fixed;
}

.right {
	margin-left: 25%;
}
</style>
</head>
<body>
<header>
	GPIO-Steuerung
</header>
<div class="links">

<form method="get" action="index.php">
	<p>
		<input type="radio" name="gpio" value="2">2<br>
		<input type="radio" name="gpio" value="3">3<br>
		<input type="radio" name="gpio" value="4">4<br>
		<input type="radio" name="gpio" value="7">7<br>
		<input type="radio" name="gpio" value="8">8<br>
		<input type="radio" name="gpio" value="9">9<br>

		<input type="radio" name="gpio" value="10">10<br>
		<input type="radio" name="gpio" value="11">11<br>
		<input type="radio" name="gpio" value="14">14<br>
		<input type="radio" name="gpio" value="15">15<br>
		<input type="radio" name="gpio" value="17">17<br>
		<input type="radio" name="gpio" value="18">18<br>

		<input type="radio" name="gpio" value="22">22<br>
		<input type="radio" name="gpio" value="23">23<br>
		<input type="radio" name="gpio" value="24">24<br>
		<input type="radio" name="gpio" value="25">25<br>
		<input type="radio" name="gpio" value="27">27<br>
	</p>
	<input type="submit" value="Licht ein" name="Lichtein">
	<input type="submit" value="Licht aus" name="Lichtaus">
	<br>
	<br>
</form>
</div>
<div class="right">
	<b>Zustand:</b>
	<?php 
	if(isset($_GET['gpio']))
	{
		$gpio = $_GET['gpio'];
		if(isset($_GET['Lichtein']))
		{
			@shell_exec("/usr/local/bin/gpio -g write $gpio 1");
		}
		if(isset($_GET['Lichtaus']))
		{
			@shell_exec("/usr/local/bin/gpio -g write $gpio 0");
		}
	}
	$gpio2 = array [2, 3, 4, 17, 27, 22, 10, 9, 11, 14, 15, 18, 23, 24, 25, 8, 7];
	asort($gpio2);
	foreach ($gpio as $value)  {
		$ausgabe = @shell_exec("/usr/local/bin/gpio -g read $value");
		echo "<br>$value: $ausgabe";
	}
	?>
</div>
</body>

</html>