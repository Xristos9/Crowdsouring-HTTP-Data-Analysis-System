<?php
	include "db_conn.php";

$result = mysqli_num_rows(mysqli_query($conn,"SELECT userID FROM `person`"));

$method1 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `method`='POST'"));
$method2 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `method`='GET'"));

$status1 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `status`=0"));
$status2 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `status`=200 OR `status`=201 OR `status`=204 OR `status`=206"));
$status3 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `status`=301 OR `status`=302 OR `status`=304 OR `status`=307"));
$status4 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `status`=400 OR `status`=401 OR `status`=404"));
$status5 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `status`=502 OR `status`=504"));

$result2 = mysqli_query($conn,"SELECT `url` FROM `hardata` ORDER BY `hardata`.`url` ASC");
$url1= array();
	if (mysqli_num_rows($result2) > 0) {
		while($row = mysqli_fetch_assoc($result2)) {
			array_push($url1,$row['url']);
		}
    }
    
$result3 = mysqli_query($conn,"SELECT `ISP` FROM `ips` ORDER BY `ips`.`ISP` ASC");
$ISP1= array();
	if (mysqli_num_rows($result3) > 0) {
		while($row1 = mysqli_fetch_assoc($result3)) {
			array_push($ISP1,$row1['ISP']);
		}
    }


// print_r($counts);