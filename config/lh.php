<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';	     // MMDVMhost Config
?>

<body bgcolor="#0B355F" text="#FFFFFF">
</Body>
</Table>
</td>
<body style="vertical-align: top">
<Table style="float:left; width: 100%">
    <tr>
      <th><a class="tooltip"> <span><b>Zeit</b></span></a></th>
      <th><a class="tooltip"><span><b>Zeit Schlitz</b></span></a></th>
      <th><a class="tooltip"><span><b>Rufzeichen</b></span></a></th>
      <th><a class="tooltip"></a><span><b>Talk Group</b></span></a></th>
      <th><a class="tooltip"><span><b>Quelle</b></span></a></th>
      <th><a class="tooltip"><span><b>Länge</b></span></a></th>
      <th><a class="tooltip"><span><b>Verlustrate</b></span></a></th>
      <th><a class="tooltip"><span><b>BER</b></span></a></th>
      <th><a class="tooltip"><span><b>RSSI</b></span></a></th>    </tr>

<?php
$i = 0;
for ($i = 0;  ($i <= 9); $i++) { //Last 8 calls
	if (isset($lastHeard[$i])) {
		$listElem = $lastHeard[$i];
		if ( $listElem[2] ) {
			$utc_time = $listElem[0];
                        $utc_tz =  new DateTimeZone('UTC');
                        $local_tz = new DateTimeZone(date_default_timezone_get ());
                        $dt = new DateTime($utc_time, $utc_tz);
                        $dt->setTimeZone($local_tz);
                        $local_time = $dt->format('H:i:s');
		echo"<tr>";
		echo"<td align=\"center\">$local_time</td>";
		echo"<td align=\"center\">$listElem[1]</td>";
		if (is_numeric($listElem[2]) || strpos($listElem[2], "openSPOT") !== FALSE) {
			echo "<td align=\"center\">$listElem[2]</td>";
		} elseif (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $listElem[2])) {
                        echo "<td align=\"center\">$listElem[2]</td>";
		} else {
			if (strpos($listElem[2],"-") > 0) { $listElem[2] = substr($listElem[2], 0, strpos($listElem[2],"-")); }
			if ( $listElem[3] && $listElem[3] != '    ' ) {
				//echo "<td align=\"left\"><a href=\"http://www.qrz.com/db/$listElem[2]\" data-featherlight=\"iframe\" data-featherlight-iframe-min-width=\"90%\" data-featherlight-iframe-max-width=\"90%\" data-featherlight-iframe-width=\"2000\" data-featherlight-iframe-height=\"2000\">$listElem[2]</a>/$listElem[3]</td>";
				echo "<th align=\"Center\"><a style=\"color: #FFFFFF;\"href=\"http://www.qrz.com/db/$listElem[2]\" target=\"_blank\">$listElem[2]</a>/$listElem[3]</td>";
			} else {
				//echo "<td align=\"left\"><a href=\"http://www.qrz.com/db/$listElem[2]\" data-featherlight=\"iframe\" data-featherlight-iframe-min-width=\"90%\" data-featherlight-iframe-max-width=\"90%\" data-featherlight-iframe-width=\"2000\" data-featherlight-iframe-height=\"2000\">$listElem[2]</a></td>";
				echo "<th align=\"Center\"><a style=\"color: #FFFFFF;\"href=\"http://www.qrz.com/db/$listElem[2]\" target=\"_blank\">$listElem[2]</a></td>";
			}
		}

		if ( substr($listElem[4], 0, 6) === 'CQCQCQ' ) {
			echo "<td align=\"center\">$listElem[4]</td>";
		} else {
			echo "<td align=\"center\">".str_replace(" ","&nbsp;", $listElem[4])."</td>";
		}



		if ($listElem[5] == "RF"){
			echo "<th style=\"background:#1d1;\">RF</td>";
		}else{
			echo "<th align=\"center\">$listElem[5]</td>";
		}
		if ($listElem[6] == null) {
				echo "<th style=\"background:#f33;\">TX</th><td></td><td></td>";
			} else if ($listElem[6] == "SMS") {
				echo "<th style=\"background:#1d1;\">SMS</th><td></td><td></td>";
			} else {
			echo "<th>$listElem[6]</th>";

			// Colour the Loss Field
			if (floatval($listElem[7]) < 1) { echo "<th>$listElem[7]</th>"; }
			elseif (floatval($listElem[7]) == 1) { echo "<th style=\"background:#1d1;\">$listElem[7]</th>"; }
			elseif (floatval($listElem[7]) > 1 && floatval($listElem[7]) <= 3) { echo "<th style=\"background:#fa0;\">$listElem[7]</th>"; }
			else { echo "<th style=\"background:#f33;\">$listElem[7]</th>"; }

			// Colour the BER Field
			if (floatval($listElem[8]) == 0) { echo "<th>$listElem[8]</th>"; }
			elseif (floatval($listElem[8]) >= 0.0 && floatval($listElem[8]) <= 1.9) { echo "<th style=\"background:#1d1;\">$listElem[8]</th>"; }
			elseif (floatval($listElem[8]) >= 2.0 && floatval($listElem[8]) <= 4.9) { echo "<th style=\"background:#fa0;\">$listElem[8]</th>"; }
			else { echo "<th style=\"background:#f33;\">$listElem[8]</th>"; }
		
			echo"<th>$listElem[9]</th>"; //rssi
		}
		echo"</tr>\n";
		}
	}
}
?>
<tr></tr> 
<tr> </tr>
<tr> </tr>
</Body>
</table>
</table>
<td> </tr>
<td> </tr>
<td> </tr>
<hr />
<p>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>SYSTEM INFO</strong></p>
<table border="1" style="border-collapse: collapse; width: 55.0%;">
<tbody>
<tr>
<td style="width: 28.0%; text-align: center;">System Temp</td>
<td style="width: 22.0%; text-align: center;">System Load</td>
</tr>
<tr>
<td style="width: 28.0%; text-align: center;">
 <?php 
$cputemp1 = shell_exec('cat /sys/class/thermal/thermal_zone0/temp');
$string = "$cputemp1";
$cputemp = substr($string, 0, 2);
echo number_format($cputemp);
echo  °C
?>
  </td>
<td style="width: 22.0%; text-align: center;">
<?php
$cpuuse1 = shell_exec('cat /proc/loadavg');
$string = "$cpuuse1";
$cpuuse = substr($string, 0, 5);
echo ($cpuuse);
?>
</td>
</tr>
</tbody>
</table>
<tr>
</tr>
</tbody>
</table>
