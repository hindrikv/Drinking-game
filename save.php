
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
require($_SERVER['DOCUMENT_ROOT']."/spel/opmaak/header.php");
require("config/config.php");


?>
<br>
<br>
<div class="card border-info mb-3 mx-auto" style="max-width: 25rem;">
    <div class="card-body text-info align-self-center">
        <h5 class="card-title text-center">Drank spel</h5>
        <p class="card-text text-center">
            <?php
            $iddb1 = $_POST["Id"];
            $namendb = $_POST["namen"];

            echo $check;

            $check = mysqli_real_escape_string($conn,$iddb1);
            $sql = "SELECT * FROM spelers WHERE id ='$check'";
            $res = mysqli_query($conn,$sql);
            if ($res === FALSE){
                echo "er gaat iets kapot";
            }
            elseif(mysqli_num_rows($res)==1){
                echo "De code: <strong>".$iddb1."</strong> bestaat al... Probeer een andere code.";
            }
            else{
                $sql = "INSERT INTO spelers (Id, namen) VALUES ('$iddb1', '$namendb')";
                if(mysqli_query($conn, $sql)){
                    echo "De groep is opgeslagen onder de code: <strong>".$iddb1."</strong><br>";
                    echo "Met de volgende dronken dropjes:<br>";
                    $namencheck = unserialize($namendb);
                    for($i=0; $i<count($namencheck); $i++){
                        echo ucfirst($namencheck[$i])."<br />";
                    }

                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
            }
            $conn->close();


            ?>
            <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='/spel/spel.php'">Verder spelen!</button>
        </p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>