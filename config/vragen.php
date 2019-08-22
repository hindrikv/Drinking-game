<?php
/*
//1 = met speler 0 = voor iedereen/niet specifiek 1 speler
$vragen = array
(

    array($spelers[$rnd1]." neem 2 slokken",1),

    array($spelers[$rnd1]." drink 2 slokken uit het glas van ".$spelers[$rnd2],1),

    array("Iedereen moet een gekke bek trekken en daarna een grote slok nemen",0),

    array($spelers[$rnd1]." "."en ".$spelers[$rnd2]." moeten wisselen van beker",1),

    array("Voor diegene die straks gaan stappen, drink je glas leeg!",0),


);
*/


?>

<?php
require "config.php";
$sql = "SELECT * FROM vragen ORDER BY RAND()";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$vragen = print_r($row[vraag],true);
$soort = print_r($row[soort],true);
$conn->close();
?>
