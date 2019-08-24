<!doctype html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>Spel</title>


</head>

<body>


<?php
require 'opmaak/header.php'; //header

session_start(); // sessions opslaan

if(is_null($_POST['spelerss'])  == false) {
    $_SESSION['speler'] = $_POST['spelerss'];

}
if(is_null($_POST['dbspeler'])  == false) {
    $_SESSION['speler'] = $_POST['dbspeler'];
}
//post spelers naar de sessions spelerss is invoer veld dbspelers is uit de database

$_SESSION['speler'] = cleanArray($_SESSION['speler']);
//Lege arrays plaatsen weghalen



if(ctype_alpha($_SESSION['speler'][0][1]) == true) {
    foreach ($_SESSION['speler'] as &$value) {
        $value = array(ucfirst($value), 1);
    }
}

//maak van array multiarray


if (count($_SESSION['speler'])<3) {
    $_SESSION['error'] = "Error: te weinig spelers (min. 3 spelers)";
    header("Location: index.php");
    die();
}



//clean all empty values from array
function cleanArray($array)
{
    if (is_array($array))
    {
        foreach ($array as $key => $sub_array)
        {
            $result = cleanArray($sub_array);
            if ($result === false)
            {
                unset($array[$key]);
            }
            else
            {
                $array[$key] = $result;
            }
        }
    }

    if (empty($array))
    {
        return false;
    }

    return $array;
}



?>
<br>


<div class="alert alert-success text-center h1" role="alert">
    <?php
    //check of de random cijfers niet gelijk zijn
    $rnd1 =  rand(0,count($_SESSION['speler'])-1);
    do {
        $rnd2 =  rand(0,count($_SESSION['speler'])-1);
    } while ($rnd1 == $rnd2);

    require "config/vragen.php";

    if(intval($soort) === 0){
        echo $vragen;
    }
    elseif(intval($soort) === 1){
        echo $_SESSION['speler'][$rnd1][0]." ".$vragen;
        $_SESSION['speler'][$rnd1][1]++;
    }
    elseif(intval($soort) === 10){
        echo $_SESSION['speler'][$rnd1][0]." ".$vragen." ".$_SESSION['speler'][$rnd2][0];
        $_SESSION['speler'][$rnd1][1]++;
        $_SESSION['speler'][$rnd2][1]++;
    }
    elseif(intval($soort) === 100){
        echo $_SESSION['speler'][$rnd1][0]." en ".$_SESSION['speler'][$rnd2][0]." ".$vragen;
        $_SESSION['speler'][$rnd1][1]++;
        $_SESSION['speler'][$rnd2][1]++;
    }
    elseif(intval($soort) === 1000){
        echo $_SESSION['speler'][$rnd1][0]." ".$vragen.$_SESSION['speler'][$rnd2][0]." ".$vragen1;
        $_SESSION['speler'][$rnd1][1]++;
        $_SESSION['speler'][$rnd2][1]++;
    }
    else{
        echo "error pik";
    }
    echo "<br>";

    ?>
    </div>
<button type="button" name="next"  id="next" class="btn-lg btn-succes btn btn-primary btn-lg btn-block" onclick="document.location.href='/spel/spel.php'">Volgende!</button>
<br>
<button type="button" name="stop"  id="stop" class="btn-lg btn-danger btn-primary btn-lg btn-block" onclick="document.location.href='/spel/stop.php'">STOP :(</button>
<br>
<br>



<p>
    <a class="btn btn-primary btn-block panel-heading collapsed" style="width:49%;display:inline-block;" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"  aria-controls="multiCollapseExample1">Drunk meter</a>
    <a class="btn btn-primary btn-block panel-heading collapsed" style="width:49%;display:inline-block;margin-top:0;" data-toggle="collapse" href="#instellingen" role="button" aria-expanded="false"  aria-controls="multiCollapseExample1">Instellingen</a>
    <?php
    if (in_array_r("hindrikstat", $_SESSION['speler'])) {
    ?>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Statistieken</button>

        <?php
    }

    function in_array_r($item , $array){
    return preg_match('/"'.preg_quote($item, '/').'"/i' , json_encode($array));
    }

    ?>
</p>


<div class="row">
    <div class="col ">
        <div class="panel-collapse collapse multi-collapse" id="multiCollapseExample1">
            <div class="card card-body">
                <?php
                if(!isset($_POST['next'])){
                        $_SESSION['cnt']++;
                }
                echo "Aantal clicks dit spel: ".$_SESSION['cnt']."<br>";


                //var_dump($_SESSION['speler']);


                foreach ($_SESSION['speler'] as $key => $value){
                echo $_SESSION['speler'][$key][0]." ".$_SESSION['speler'][$key][1]."<br>";
                ?>
                        <div class="progress">
                        <div class="progress-bar" role="progressbar" style='width: <?php print_r($_SESSION['speler'][$key][1]); echo "%"; ?>;  aria-valuenow=60; aria-valuemin=0; aria-valuemax=100;'><?php echo "De "; print_r($_SESSION['speler'][$key][0]); echo " meter"; ?></div>
                        </div>
                        <br>
                <?php
                }

                ?>




            </div>
        </div>
    </div>
    <div class="col">
        <div class="collapse multi-collapse" id="instellingen">
            <div class="card card-body">
                <?php
                $spelerDB = htmlentities(serialize($_SESSION['speler']),ENT_QUOTES);
                ?>
                <form action="save.php" method="post">
                     <input type="hidden" maxlength="999999999999999999"name="namen" value=<?php echo "\"".$spelerDB."\""; ?>><br>
                    <h3>Groep aanmaken </h3>
                    <th class="text-center"> <strong> Groepsnaam: </strong> </th>
                    <br>
                    <input class="form-control text-center" type="text" name="Id" value="<?php $spelerDB ?>"><br>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Opslaan!" </>
                </form>
                <br>
                <h3> </h3>

                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample2">
            <div class="card card-body">
                <div class="card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-body text-success">
                        <h5 class="card-title">NERD statistieken</h5>
                        <p class="card-text">
                            <?php

                            echo "rnd1 = ".$rnd1;
                            echo "<br>";
                            echo "<br>";
                            echo "rnd2 = ".$rnd2;
                            echo "<br>";
                            echo "<br>";
                            echo "count spelers = ".count($_SESSION['speler']);
                            echo "<br>";
                            echo "<br>";
                            echo "Session spelers: ";
                            print_r($_SESSION[$_SESSION['speler'][0][1]]);
                            echo "<br>";
                            echo "<br>";
                            echo "spelers met clear:";
                            print_r($_SESSION['speler']);
                            echo "<br>";
                            echo "<br>";
                            echo "er zijn ".count($vragen)." vragen";
                            echo "<br>";
                            echo "push test ";
                            echo "<br>";
                            echo $_SESSION['spelers'][1][0];
                            echo "<br>";
                            echo print_r($vragen);
                            echo "<br>";
                            echo "soort; ".$soort;

                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if($_SESSION['cnt']===100) {
    ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> <br>Al 100 clicks man!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}

?>
<?php

if($_SESSION['cnt']===15)
{

    ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>¯\_(ツ)_/¯</strong> <br>Is <?php print_r($_SESSION['speler'][rand(0,count($_SESSION['speler'])-1)][0]) ?> al dronken?
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}

?>





</div>

</div>



</body>
</html>