
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Spel - login</title>

</head>
<body>
<?php
session_start(); // sessions opslaan
require($_SERVER['DOCUMENT_ROOT']."/spel/opmaak/header.php");


require_once($_SERVER['DOCUMENT_ROOT'].'/spel/config/config.php');

//if user is logged in redirect to myaccount page
if (isset($_SESSION['id'])) {
    header('Location: /spel/account/myaccount.php');
}

$error_message = '';
if (isset($_POST['submit'])) {

    extract($_POST);

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT id, status FROM users WHERE email = '" . $conn->real_escape_string($email) . "' AND password = '" . md5($conn->real_escape_string($password)) . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['status']) {
                $_SESSION['id'] = $row['id'];
                header('Location: /spel/account/myaccount.php');
            } else {
                $error_message = 'Your account is not active yet.';
            }
        } else {
            $error_message = 'Incorrect email or password.';
        }
    }
}


?>
<br>
<br>
<div class="container mx-auto">
    <div class="row mx-auto">
        <div class="col-md-6 mx-auto">
            <h3  class="text-center">Login</h3>
            <?php if(!empty($error_message)) { ?>
                <div class="alert alert-danger mx-auto"><?php echo $error_message; ?></div>
            <?php } ?>
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Wachtwoord</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>


</body>
</html>