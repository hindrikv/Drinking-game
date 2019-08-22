
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spel - Index</title>
</head>
<body>

<?php
session_start(); // sessions opslaan
if ($_GET['logout'] == 1){
    session_destroy();
    header('Location: /spel/index.php');
    }
require "opmaak/header.php";
$aantal = 1;



if (isset($_SESSION['error'])) {
    echo "<div class=\"alert alert-warning\" role=\"alert\">".$_SESSION['error']."</div>";
    unset($_SESSION['error']);
}


?>

<div class="jumbotron">
    <h1 class="display-4">Hello!</h1>
    <p class="lead">Online drank spel
        <?php
        echo $_SERVER['DOCUMENT_ROOT']."/spel/opmaak/header.php";
        ?>
    </p>
    <hr class="my-4">
    <p>
        <form action="spel.php" method="post">

        <div class="row clearfix">
            <div class="col-md-12 column">
                <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                    <tr >
                        <th class="text-center">
                            Spelers
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr id='addr0'>
                        <td>
                            <input class="form-control" type="text" name="speler1" value='<?= $_SESSION['speler1'] ?>' placeholder="<?php echo "Naam Speler ".$aantal?>">
                        </td>
                    </tr>

                    <tr id='addr1'>
                        <td>
                            <input class="form-control" type="text" name="speler2" value='<?= $_SESSION['speler2'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+1)?>">
                        </td>
                    </tr>

                    <tr id='addr2'>
                        <td>
                            <input class="form-control" type="text" name="speler3" value='<?= $_SESSION['speler3'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+2)?>">
                        </td>
                    </tr>

                    <tr id='addr3'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler4" value='<?= $_SESSION['speler4'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+3)?>">
                    </td>
                    <tr id='addr4'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler5" value='<?= $_SESSION['speler5'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+4)?>">
                    </td>
                    <tr id='addr5'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler6" value='<?= $_SESSION['speler6'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+5)?>">
                    </td>
                    <tr id='addr6'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler7" value='<?= $_SESSION['speler7'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+6)?>">
                    </td>
                    <tr id='addr7'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler8" value='<?= $_SESSION['speler8'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+7)?>">
                    </td>
                    <tr id='addr8'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler9" value='<?= $_SESSION['speler9'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+8)?>">
                    </td>
                    <tr id='addr9'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler10" value='<?= $_SESSION['speler10'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+9)?>">
                    </td>
                    <tr id='addr10'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler11" value='<?= $_SESSION['speler11'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+10)?>">
                    </td>
                    <tr id='addr11'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler12" value='<?= $_SESSION['speler12'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+11)?>">
                    </td>
                    <tr id='addr12'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler13" value='<?= $_SESSION['speler13'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+12)?>">
                    </td>
                    <tr id='addr13'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler14" value='<?= $_SESSION['speler14'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+13)?>">
                    </td>
                    <tr id='addr14'></tr>
                    <td>
                            <input class="form-control" type="text" name="speler15" value='<?= $_SESSION['speler15'] ?>' placeholder="<?php echo "Naam Speler ".($aantal+14)?>">
                    </td>
                    </tbody>
                </table>
            </div>
        </div>

        <input class="btn btn-primary btn-lg" data-toggle="popover" data-trigger="hover" title="Succes!" data-content="Don't get tooooo wasted, Right?!" type="submit" name="submit" value="START!">
        <input class="btn btn-warning" type="reset" value="Reset" onclick="window.location.href='/spel/index.php?logout=1'">
    </form>
    </p>
</div>




</body>
</html>