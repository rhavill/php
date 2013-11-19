<?php

$mysqli = new mysqli("localhost", "root", "password", "test");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/* Non-prepared statement */
//if (!$mysqli->query("DROP TABLE IF EXISTS contacts") || !$mysqli->query("CREATE TABLE contacts(id int(11) NOT NULL AUTO_INCREMENT, name VARCHAR(128), phone VARCHAR(16), PRIMARY KEY (id))")) {
//    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
//}

/* Prepared statement, stage 1: prepare */
if (!($stmt = $mysqli->prepare("INSERT INTO contacts(name, phone) VALUES (?, ?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

/* Prepared statement, stage 2: bind and execute */
$name = 'Hulk Hogan';
$phone = '305-555-1212';
if (!$stmt->bind_param("ss", $name, $phone)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}
?>
