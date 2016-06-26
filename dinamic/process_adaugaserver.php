<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
if(!empty($_POST['ip'])){
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$ip=mysql_escape_string($_POST['ip']);
$forum=mysql_escape_string($_POST['forum']);
$game=mysql_escape_string($_POST['game']);
$sql = "INSERT INTO mtode_servere (ip, forum, game)
VALUES ('$ip', '$forum', '$game')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}