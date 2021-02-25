<?php
	include "db_conn.php";

	session_start();
	$userID=$_SESSION["userID"];

	$result = mysqli_query($conn,"SELECT serverIPAddress FROM hardata INNER JOIN ips ON hardata.entryID = ips.entryID WHERE `ips`.`userID`=$userID AND (RsContentType like '%html%' OR RsContentType like '%javascript%' OR RsContentType like '%php%' OR RqContentType like '%html%' OR RqContentType like '%javascript%' OR RqContentType like '%php%') ORDER BY `hardata`.`serverIPAddress` ASC");
	$servers = array();
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			array_push($servers,$row['serverIPAddress']);
		}
	}
	// print_r($servers);
	
	
	$result2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT MAX(Date) FROM ips WHERE `userID`=$userID"));
	$_SESSION["uDate"]=$result2['MAX(Date)'];


	$result3 = mysqli_query($conn,"SELECT entryID FROM `ips` WHERE `userID`=$userID");
	$_SESSION["nOfEntries"]=mysqli_num_rows($result3);