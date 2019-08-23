<!doctype html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
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

if(is_null($_POST['spelerss']) == false) {
    $_SESSION['speler'] = $_POST['spelerss'];
}

$spelers = cleanArray($_SESSION['speler']);

foreach ($spelers as &$value) {
    $value = array(ucfirst($value),1);
}



echo $_SESSION['spelers'[1][1]];
echo "<br>";
echo $spelers[1][1];


if (count($spelers)<2) {
    $_SESSION['error'] = "Error: te weinig spelers (min. 2 spelers)";
    header("Location: index.php");
    die();
}

$_SESSION['spelers'] = $spelers;

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


<div class="alert alert-success text-center h1" role="alert">
    <?php
    //check of de random cijfers niet gelijk zijn
    $rnd1 =  rand(0,count($spelers)-1);
    do {
        $rnd2 =  rand(0,count($spelers)-1);
    } while ($rnd1 == $rnd2);

    require "config/vragen.php";

    if(intval($soort) === 0){
        echo $vragen;
    }
    elseif(intval($soort) === 1){
        echo $spelers[$rnd1][0]." ".$vragen;
        $_SESSION[$spelers[$rnd1][1]] = $_SESSION[$spelers[$rnd1][1]] + 1;
    }
    elseif(intval($soort) === 10){
        echo $spelers[$rnd1][0]." ".$vragen." ".$spelers[$rnd2][0];
        $_SESSION[$spelers[$rnd1][1]] = $_SESSION[$spelers[$rnd1][1]] + 1;
        $_SESSION[$spelers[$rnd2][1]] = $_SESSION[$spelers[$rnd2][1]] + 1;
    }
    elseif(intval($soort) === 100){
        echo $spelers[$rnd1][0]." en ".$spelers[$rnd2][0]." ".$vragen;
        $_SESSION[$spelers[$rnd1][1]] = $_SESSION[$spelers[$rnd1][1]] + 1;
        $_SESSION[$spelers[$rnd2][1]] = $_SESSION[$spelers[$rnd2][1]] + 1;
    }
    elseif(intval($soort) === 1000){
        echo $spelers[$rnd1][0]." ".$vragen.$spelers[$rnd2][0]." ".$vragen1;
        $_SESSION[$spelers[$rnd1][1]] = $_SESSION[$spelers[$rnd1][1]] + 1;
        $_SESSION[$spelers[$rnd2][1]] = $_SESSION[$spelers[$rnd2][1]] + 1;
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
    <a class="btn btn-primary btn-block" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Drunk meter</a>

    <?php
    //if (in_array_r("hindrikstat", $spelers)) {
    ?>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Statistieken</button>

        <?php
    //}

    function in_array_r($item , $array){
    return preg_match('/"'.preg_quote($item, '/').'"/i' , json_encode($array));
    }
    ?>
</p>


<div class="row">
    <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample1">
            <div class="card card-body">
                <?php
                if(!isset($_POST['next'])){
                        $_SESSION['cnt']++;
                }
                echo "Aantal clicks dit spel: ".$_SESSION['cnt']."<br>";
                echo $spelers[0][0]." ".$spelers[0][1]."<br>";
                echo $spelers[1][0]." ".$spelers[1][1]."<br>";
                echo $spelers[2][0]." ".$spelers[2][1]."<br>";
                print_r()
                ?>



                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $spelers[0][1]."%"; ?>;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"><?php echo "De ".$spelers[0][0]." meter"; ?></div>
                </div>
                        <br>

                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $spelers[0][1]."%"; ?>;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"><?php echo "De ".$spelers[1][0]." meter"; ?></div>
                </div>
                        <br>

                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $spelers[0][1]."%"; ?>;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"><?php echo "De ".$spelers[2][0]." meter"; ?></div>
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
                            echo "count spelers = ".count($spelers);
                            echo "<br>";
                            echo "<br>";
                            echo "Session spelers: ";
                            print_r($_SESSION[$spelers[0][1]]);
                            echo "<br>";
                            echo "<br>";
                            echo "spelers met clear:";
                            print_r($spelers);
                            echo "<br>";
                            echo "<br>";
                            echo "er zijn ".count($vragen)." vragen";
                            echo "<br>";
                            echo "push test ";
                            echo "<br>";
                            echo print_r($tempa);
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
        <strong>¯\_(ツ)_/¯</strong> <br>Is <?php print_r($spelers[rand(0,count($spelers)-1)][0]) ?> al dronken?
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