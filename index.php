
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
        <br>
        <br>
        <?php
        if(count($_SESSION['speler'])>2){
            echo "Doorgaan met oude spelers? <br>";
            foreach ($_SESSION['speler'] as $key => $value){
                echo $_SESSION['speler'][$key][0]."<br>";
            }
            ?>
            <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='/spel/spel.php'">Ja!</button>
            <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='/spel/index.php?logout=1'">Nope</button>
        <?php
        }
        else{
        ?>
    </p>
    <hr class="my-4 align-self-center">
    <p>
    <form action="spel.php" method="post">

        <div class="row clearfix vertical-center">
            <div class="col-md-12 column ">
                <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Spelers
                        </th>
                    </tr>
                    </thead>
                    <tbody class="field_wrapper">

                    <tr>
                        <td>
                            <input class="form-control text-center" type="text" name="spelerss[]"
                                   value='<?php echo $_SESSION['spelers'][0][0]; ?>'
                                   placeholder="<?php echo "Naam Speler " . $aantal ?>">

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input class="form-control text-center" type="text" name="spelerss[]"
                                   value='<?php echo $_SESSION['spelers'][1][0]; ?>'
                                   placeholder="<?php echo "Naam Speler " . ($aantal + 1) ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input class="form-control text-center" type="text" name="spelerss[]"
                                   value='<?php echo $_SESSION['spelers'][2][0] ?>'
                                   placeholder="<?php echo "Naam Speler " . ($aantal + 2) ?>">
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <a href="javascript:void(0);" class="add_input_button text-center" title="Add field"><h1> + </h1></a>

        <input class="btn btn-primary btn-lg btn-block" data-toggle="popover" data-trigger="hover" title="Succes!"
               data-content="Don't get tooooo wasted, Right?!" type="submit" name="submit" value="START!">
        <input class="btn btn-warning btn btn-primary btn-lg btn-block" type="reset" value="Reset"
               onclick="window.location.href='/spel/index.php?logout=1'">



    </form>
    <br>
    <br>
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#demo">Groepscode?</button>
<div id="demo" class="collapse">
    <div class="card mx-auto" style="width: 18rem;">
        <div class="card-body ">
            <p class=" mx-auto card-title"><form action="herladen.php" method="post">
                <p class="text-center"> Met een groeps code vind je easy je vrienden weer! :D</p>
                <p class="text-center"><strong>id:</strong></p> <input class="form-control text-center" type="text" name="Id"><br>
                <input class="btn btn-primary btn-lg btn-block" type="submit">
            </form></p>

            <?php
            }
            ?>
        </div>

</div>
        </div>
</div>




    </p>
</div>



<script type="text/javascript">
        var input_count = 4;

    $(document).ready(function(){
        var arra = <?php echo json_encode($_SESSION['speler']); ?>;
        var max_fields = 16;
        var add_input_button = $('.add_input_button');
        var field_wrapper = $('.field_wrapper');


// Add button dynamically
        $(add_input_button).click(function(){
            var new_field_html =
                '<tr> <td> <input class="form-control text-center" type="text" name="spelerss[]" placeholder="<?php echo "Naam Speler ' + input_count + ' "; ?>"> </td> </tr> <?php $aantal = $aantal +1; ?>';

            if(input_count < max_fields){
                input_count++;
                console.log(input_count);
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

