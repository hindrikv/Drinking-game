
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

<div class="jumbotron align-self-center">
    <h1 class="display-4 text-center">Hello!</h1>
    <p class="lead text-center">Online drank spel
        <?php
        echo print_r($_SESSION[$spelers]);
        echo $_SESSION['spelers'[1][0]];
        ?>
    </p>
    <hr class="my-4 align-self-center">
    <p>
        <form action="spel.php" method="post">

        <div class="row clearfix vertical-center">
            <div class="col-md-12 column ">
                <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                    <tr >
                        <th class="text-center">
                            Spelers
                        </th>
                    </tr>
                    </thead>
                    <tbody class="field_wrapper">

                    <tr>
                        <td>
                            <input class="form-control text-center" type="text" name="spelerss[]" value='<?php print_r($_SESSION['spelers'][0][1]); ?>' placeholder="<?php echo "Naam Speler ".$aantal?>">

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input class="form-control text-center" type="text" name="spelerss[]" value='<?php echo test; ?>' placeholder="<?php echo "Naam Speler ".($aantal+1)?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input class="form-control text-center" type="text" name="spelerss[]" value='<?php echo $spelers[2][0] ?>' placeholder="<?php echo "Naam Speler ".($aantal+2)?>">
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <a href="javascript:void(0);" class="add_input_button" title="Add field"><h1> + </h1></a>
        <input class="btn btn-primary btn-lg btn-block" data-toggle="popover" data-trigger="hover" title="Succes!" data-content="Don't get tooooo wasted, Right?!" type="submit" name="submit" value="START!">
        <input class="btn btn-warning btn btn-primary btn-lg btn-block" type="reset" value="Reset" onclick="window.location.href='/spel/index.php?logout=1'">

    </form>
    </p>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        var max_fields = 16;
        var add_input_button = $('.add_input_button');
        var field_wrapper = $('.field_wrapper');
        var input_count = 4;
        var new_field_html =
            '<tr> <td> <input class="form-control text-center" type="text" name="spelerss[]" value="<?= $_SESSION["speler4"] ?>"placeholder="<?php echo "Naam Speler "; ?>"> </td> </tr> <?php $aantal = $aantal +1; ?>';
        function clicks() {
            window.location.href = input_count;
        }
// Add button dynamically
        $(add_input_button).click(function(){
            if(input_count < max_fields){
                input_count++;
                $(field_wrapper).append(new_field_html);
            }
        });
// Remove dynamically added button
        $(field_wrapper).on('click', '.remove_input_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove();
            input_count--;
        });
    });</script>


</body>
</html>
