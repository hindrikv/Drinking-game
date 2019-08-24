<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Hindrik - Spel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <ul class="navbar-nav mr-auto">
            <a class="nav-item nav-link active" href="/spel/index.php">
                <?php
                if($_SERVER['PHP_SELF'] == "/spel/index.php") echo "<strong>HOME</strong>";
                else echo "Home";
                ?>
            </a>

            <a class="nav-item nav-link" href="/spel/views/regels.php">
                <?php
                if($_SERVER['PHP_SELF'] == "/spel/views/regels.php") echo "<strong>REGELS</strong>";
                else echo "Regels";
                ?>
            </a>

            </ul>
            <ul class="nav navbar-nav mr-auto">
            <a class="nav-item nav-link mr-auto" href="/spel/account/login.php">
                <?php
                if($_SERVER['PHP_SELF'] == "/spel/account/login.php") echo "<strong>LOGIN</strong>";
                elseif(isset($_SESSION['id'])) {
                    echo "profiel";
                }
                else{
                    echo "login";
                };
                ?>
            </a>


            <li class="nav-item dropdown mr-auto">

                <a class="nav-link dropdown-toggle mr-auto" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if($_SERVER['PHP_SELF'] == "/spel/views/code.php" || "/spel/views/versie.php" || "/spel/views/contact.php") echo "<strong>Over</strong>";
                    else echo "Over";
                    ?>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/spel/views/code.php">
                        <?php if($_SERVER['PHP_SELF'] == "/spel/views/code.php") echo "<strong>Code</strong>";
                        else echo "Code";
                        ?>
                    </a>

                    <a class="dropdown-item" href="/spel/views/versie.php">
                        <?php if($_SERVER['PHP_SELF'] == "/spel/views/versie.php") echo "<strong>Versie</strong>";
                        else echo "Versie";
                        ?>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="/spel/views/contact.php">
                        <?php if($_SERVER['PHP_SELF'] == "/spel/views/contact.php") echo "<strong>Contact</strong>";
                        else echo "Contact";
                        ?>
                    </a>

                </div>
            </li>
            </ul>
        </div>
    </div>
</nav>

<?php if($_SERVER['PHP_SELF'] == "/index.php") echo '<span class="sr-only">(current)</span>'; ?>


