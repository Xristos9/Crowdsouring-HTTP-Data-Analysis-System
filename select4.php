<?php
	include "db_conn.php";

	$ISP = array();
	$result1 = mysqli_query($conn,"SELECT `IP` FROM `ips`");
	if (mysqli_num_rows($result1) > 0) {
		while($row1 = mysqli_fetch_assoc($result1)) {
			array_push($ISP,$row1['IP']);
		}
	}

	$ISP1 = array();
	$r = 0;
	foreach($ISP as $kati1){
		if($r !== $kati1){
			$r=$kati1;
			array_push($ISP1,$r);
		}
	}

	for($i=0; $i<count($ISP1); $i++){
		$result2 = mysqli_query($conn,"SELECT `entryID` FROM `ips` WHERE `IP`='$ISP1[$i]'");
		$array[$i] = array();
		if (mysqli_num_rows($result2) > 0) {
			while($row = mysqli_fetch_assoc($result2)) {
				array_push($array[$i],$row['entryID']);
			}
		}
	}

	for($i=0; $i<count($array); $i++){
		$array2[$i] = array();
		foreach($array[$i] as $kati){
			$result3 = mysqli_query($conn,"SELECT `serverIPAddress` FROM `hardata` WHERE `entryID`='$kati' ORDER BY `serverIPAddress` ASC");
			if (mysqli_num_rows($result3) > 0) {
				while($row = mysqli_fetch_assoc($result3)) {
					array_push($array2[$i],$row['serverIPAddress']);
				}
			}
		}
	}
