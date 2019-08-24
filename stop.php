
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spel - Code</title>

</head>
<body>
<?php
session_start(); // sessions opslaan
require "opmaak/header.php";




?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Het einde!</h1>
        <p class="lead">
            <a  target="_blank"><img src="https://media.gifs.nl/sad-gifs-kATKu3.gif" /></a>
<br>
            <?php
            echo "Met in totaal ".$_SESSION['cnt']." clicks";
            echo "<br>";
?>
        </p>
        <?php
            foreach ($_SESSION['speler'] as $key => $value){
            echo $_SESSION['speler'][$key][0]." ".$_SESSION['speler'][$key][1]."<br>";
            ?>

        <div class="progress">
            <div class="progress-bar" role="progressbar" style='width: <?php print_r($_SESSION['speler'][$key][1]); echo "%"; ?>;  aria-valuenow=60; aria-valuemin=0; aria-valuemax=100;'><?php echo "De ".$_SESSION['speler'][$key][0]." meter"; ?></div>
        </div>

        <?php
                }

                ?>

    </div>
</div>
<?php
session_destroy();
?>
<script>
    $(document).on('ready',function(){
        $('.progress .progress-bar').css("width",function() {
            return $(this).attr("aria-valuenow") + "%";
        })
    })
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>