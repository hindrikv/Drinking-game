
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spel - Contact</title>

</head>
<body>
<?php
session_start(); // sessions opslaan
session_destroy();
require($_SERVER['DOCUMENT_ROOT']."/spel/opmaak/header.php");
require("config/config.php");
$iddb2 = $_POST["Id"];
$sql = "SELECT namen FROM spelers WHERE Id='$iddb2' LIMIT 1";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$dbspeler= unserialize($row['namen']);
?>

<br>
<br>
<div class="card border-info mb-3 mx-auto" style="max-width: 25rem;">
    <div class="card-body text-info align-self-center">
        <h5 class="card-title text-center">Loading players...</h5>
        <p class="card-text text-center">
            <?php

            $check = mysqli_real_escape_string($conn,$iddb2);
            $sql = "SELECT * FROM spelers WHERE id ='$check'";
            $res = mysqli_query($conn,$sql);
            if ($res === FALSE){
                echo "er gaat iets kapot";
                }

            elseif(mysqli_num_rows($res)==1){

            echo "<strong> Zijn dat?</strong> <br> ";

            for($i=0; $i<count($dbspeler); $i++){
                echo ucfirst($dbspeler[$i])."<br />";
                }

            ?>
            <form action="spel.php" method="post">
            <?php
            for($i=0; $i<count($dbspeler); $i++){
                echo "<input type='hidden' name='dbspeler[]' value=$dbspeler[$i]>";
                }
            ?>
            <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Klopt!">
            <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='/spel/index.php?logout=1'">Wie?</button>
            <?php
            }
            else{
                echo "Die code bestaat niet man. Sukkel!<br><br>";
                ?>
                <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='/spel/index.php?logout=1'">Opnieuw proberen?</button>
            <?php
            }



            ?>


        </form>
        </p>
    </div>
</div>




<?php
$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

