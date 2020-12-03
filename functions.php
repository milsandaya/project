<?php

function create($table, $data){
	
	global $conn;
	$sql = "INSERT INTO $table SET";

	$i = 0;
	foreach($data as $key => $value) {
		if ($i === 0) {
			$sql = $sql . " $key=?";
		} else {
			$sql = $sql . ", $key=?";
		}
		$i++;
	}

	$stmt = executeQuery($sql, $data);
	$id = $stmt->insert_id;
	return $id;
}

function pickOne($table, $conditions){
	
	global $conn;
	$sql = "SELECT * FROM  $table";

	$i = 0;
	foreach($conditions as $key => $value) {
		if ($i === 0) {
			$sql = $sql . " WHERE $key=?";
		} else {
			$sql = $sql . " AND $key=?";
		}
		$i++;
	}

	$sql = $sql . " LIMIT 1";
	$stmt = executeQuery($sql, $conditions);
	$records = $stmt->get_result()->fetch_assoc();
	return $records;
}

?>