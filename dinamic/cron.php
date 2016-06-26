<?php
require("../GameQ/GameQ.php");
$servername = "";
$username = "";
$password = "";
$dbname = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM mtode_servere";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $gq = new GameQ();
        $gq->setOption('timeout', 4);
$gq->addServer(array(
    'id' => $row['id'],
    'type' => $row['game'], // Counter-Strike: Source
    'host' => $row['ip'],
));

$results = $gq->requestData();

//print_r($results);
        $id=$row['id'];
        $num_players = $results[$id]['num_players'];
        $max_players = $results[$id]['max_players'];
        $map = $results[$id]['map'];
        $hostname = $results[$id]['hostname'];
        
     $online = $results[$id]['gq_online'];
     echo "online:" . $online;
        
        $sql2 = "UPDATE mtode_servere SET num_players='$num_players', max_players='$max_players', map='$map', hostname='$hostname', online='$online' WHERE id=$id";

if ($conn->query($sql2) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 


    }
} else {
    echo "0 results";
}
$conn->close();
?>