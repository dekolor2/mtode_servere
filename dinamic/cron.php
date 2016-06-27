<?php
require("../GameQ/GameQ.php");
$servername = "";
$username = "";
$password = "";
$dbname = "";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM mtode_servere";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $gq = new GameQ();
        $gq->setOption('timeout', 4);
$gq->addServer(array(
    'id' => $row['id'],
    'type' => $row['game'],
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
    echo "Actualizat.";
} else {
    echo "Error updating record: " . $conn->error;
} 


    }
} else {
    echo "<center><b style='color:red;'>Nu avem servere in baza de date!</b></center>";
}
$conn->close();
?>