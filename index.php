<html> 
<head>
<body>
	<script type="text/javascript" src="/config/jquery.min.js"></script>
	<script type="text/javascript" src="/config/functions.js"></script>
	<meta name="viewport" content="width=device-width,">
	<body bgcolor="#0B355F" text="#FFFFFF">
</body>
</head>
</html>

<?php
	include 'config/config.php';


	// Output some default features
	if ($_SERVER["PHP_SELF"] == "/index.php") {
        }
	echo '<script type="text/javascript">'."\n";
	echo 'function reloadLastHerd(){'."\n";
	echo '  $("#lastHerd").load("/config/lh.php",function(){ setTimeout(reloadLastHerd,1500) });'."\n";
	echo '}'."\n";
	echo 'setTimeout(reloadLastHerd,1500);'."\n";
	echo '$(window).trigger(\'resize\');'."\n";
	echo '</script>'."\n";
	echo '<div id="lastHerd">'."\n";
	include '/var/www/html//config/lh.php';					// MMDVMDash Last Heard
	echo '</div>'."\n";
?>


