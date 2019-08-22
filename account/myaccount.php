


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spel - mijn account</title>

</head>
<body>
<?php
session_start();

if (isset($_GET['action']) && ('logout' == $_GET['action'])) {
    unset($_SESSION['id']);
}

if (isset($_SESSION['id'])) {
    ?>
    <?php
    require($_SERVER['DOCUMENT_ROOT']."/spel/opmaak/header.php");
    require($_SERVER['DOCUMENT_ROOT']."/spel/config/config.php");

    $iddb = $_POST["Id"];
    $vraagdb = $_POST["vraag"];
    $soortdb = $_POST["soort"];

    $sql = "INSERT INTO vragen (Id, vraag, soort) VALUES ('$iddb', '$vraagdb', '$soortdb')";
    if(mysqli_query($conn, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }


    $result = mysqli_query($conn, "SELECT * FROM vragen");
    $num_rows = mysqli_num_rows($result); // aantal regels
    echo "<br>";
    echo "aantal Id's = ".$num_rows;



    ?>
    <h3>Welcome User ! <a href="?action=logout">Logout</a></h3>
    <form action="myaccount.php" method="post">
        id: <input type="text" name="Id"><br>
        vraag: <input type="text" name="vraag"><br>
        soort: <input type="text" name="soort"><br>
        <?php
        echo " 0 = geen speler <br> 1 = rnd 1 - text <br> 10 = rnd1 - text - rnd2 <br> 100 = rnd 1 en rnd 2 - text"
        ?>
        <input type="submit">
    </form>
    <?php
} else { //redirect to login page
    header('Location: index.php');
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
