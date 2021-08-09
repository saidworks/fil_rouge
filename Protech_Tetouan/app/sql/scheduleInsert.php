<?php
// Create a new MySQLi object.
$mysqli = new mysqli("localhost", "root", "password", "database");

// Create a statement object.
$stmt = $mysqli->prepare("INSERT INTO items (user_id, room_id, base_item, extra_data) VALUES (?, ?, ?, ?)");
// For each question mark, put in the four variables.
$stmt->bind_param("iiis", $userid, $roomid, $baseitem, $extradata);

// Set the values for the placeholders above.
$userid = 12;
$roomid = 0;
$baseitem = 202;
$extradata = "";

// Create a loop that will loop for 10 iterations.
for($i = 0; $i < 10; $i++)
{
    $stmt->execute();
}

// Close our statement object.
$stmt->close();
// Close our connection object.
$mysqli->close();

// Done!
?>