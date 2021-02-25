<?php
	include "db_conn.php";

$result = mysqli_num_rows(mysqli_query($conn,"SELECT userID FROM `person`"));

$method1 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `method`='POST'"));
$method2 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `method`='GET'"));
$method3 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `method`='OPTIONS'"));

$status1 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `status`=0"));
$status2 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `status`=200 OR `status`=201 OR `status`=202 OR `status`=203 OR `status`=204 OR `status`=205 OR `status`=206 OR `status`=207 OR `status`=208 OR `status`=226"));
$status3 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `status`=300 OR `status`=301 OR `status`=302 OR `status`=303 OR `status`=304 OR `status`=305 OR `status`=306 OR `status`=307 OR `status`=308"));
$status4 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `status`=400 OR `status`=401 OR `status`=402 OR `status`=403 OR `status`=404 OR `status`=405 OR `status`=406 OR `status`=407 OR `status`=408 OR `status`=409 OR `status`=410 OR `status`=411 OR `status`=412 OR `status`=413 OR `status`=414 OR `status`=415 OR `status`=416 OR `status`=417 OR `status`=418 OR `status`=421 OR `status`=422 OR `status`=423 OR `status`=424 OR `status`=425 OR `status`=426 OR `status`=428 OR `status`=429 OR `status`=431 OR `status`=451"));
$status5 = mysqli_num_rows(mysqli_query($conn,"SELECT `entryID` FROM `hardata` WHERE `status`=500 OR `status`=501 OR `status`=502 OR `status`=503 OR `status`=504 OR `status`=505 OR `status`=506 OR `status`=507 OR `status`=508 OR `status`=510 OR `status`=511"));

$result2 = mysqli_query($conn,"SELECT `url` FROM `hardata` ORDER BY `hardata`.`url` ASC");
$url1 = array();
	if (mysqli_num_rows($result2) > 0) {
		while($row = mysqli_fetch_assoc($result2)) {
			array_push($url1,$row['url']);
		}
	}	

$result3 = mysqli_query($conn,"SELECT `ISP` FROM `ips` ORDER BY `ips`.`ISP` ASC");
$ISP1 = array();
	if (mysqli_num_rows($result3) > 0) {
		while($row1 = mysqli_fetch_assoc($result3)) {
			array_push($ISP1,$row1['ISP']);
		}
	}