<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_GET['g'])){
    $joccerut = mysql_escape_string($_GET['g']);
    $sql = "SELECT * FROM mtode_servere WHERE game='$joccerut'";
}
else {
 $sql = "SELECT * FROM mtode_servere ORDER BY vip DESC";   
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?><table class="table">
    <tr><th>status<th>ip</th><th>hostname</th><th>jucatori</th><th>harta</th><th>joc</th><th>forum</th></tr><?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?><tr><td><?php if($row['vip']==1) { echo "<img alt='VIP' src='vip.png'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; } if($row['online']==1) {?><span class="label label-success">online</span> <?php } else { ?><span class="label label-danger">offline</span><?php } ?></td><td><?php echo $row['ip']; ?></td><td><?php echo $row['hostname']; ?></td><td><?php echo $row['num_players'] . "/" . $row['max_players']; ?></td><td><?php echo $row['map']; ?></td><td><?php echo $row['game']; ?></td><td><a target="_blank" href="<?php echo $row['forum']; ?>">click</a></td></tr><?php
    } ?></table><?php
} else {
    echo "<center><b style='color:red;'>Nu avem servere in baza de date!</b></center>";
}
$conn->close();
?>