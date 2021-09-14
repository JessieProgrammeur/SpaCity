<?php

include 'db.php';
include 'validation.php';

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])){

    $status = trim(strtolower($_POST['status']));

    $sql = "INSERT INTO betalingen VALUES(NULL, :status, :created_at, :updated_at)";
        
    $created_at = $updated_at = date('Y-m-d H:i:s');

    $placeholder = [
        'status'=>$status,
        'created_at'=>$created_at,
        'updated_at'=>$updated_at
    ];

    $db = new db();
    $db->insert($sql, $placeholder, "overzicht_betalingen.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpaCity</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a href="welkom_admin.php">
                    <img src="logo-spa-city.svg" alt="project logo" width="220" heigth="80">
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <p class="nav navbar-text">Automatiserings Applicatie</p>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="welkom_admin.php" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo "Welkom " . htmlentities( $_SESSION['gebruikersnaam']) ."!" ?></b> <span
                                class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-primary btn-block">Logout</a>
                                    </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-2" id="homemenu3">
            <br>
            <h4 class="menu">Menu</h4>
            <br />
            <a class="menulinks" href="welkom_admin.php">Home</a>
            <br />
            <br />
            <button class="dropdown-btn">Basisgegevens 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
            <br />
            <br />
            <a class="menulinks" href="overzicht_usertype.php">Overzicht Usertypes</a>
            <br />
            <br />
            <a class="menulinks" href="overzicht_gebruikers.php">Overzicht Gebruikers</a>
            <br />
            <br />
            <a class="menulinks" href="overzicht_klanten.php">Overzicht Klanten</a>
            <br />
            <br />
            <a class="menulinks" href="overzicht_betalingen.php">Overzicht Status Betalingen</a>
            <br />
            <br />
            </div>
            <br />
            <br />
            <button class="dropdown-btn">Status Betaling 
                <i class="fa fa-caret-down"></i>
            <br />
            <br />        
            </button>
            <div class="dropdown-container">
            <br />
            <br />
            <a class="menulinks" href="overzicht_status_betalingen.php">Overzicht Betalingen</a>
            </div>
            <br />
            <br /> 
            <button class="dropdown-btn">Uploaden 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
            <br />
            <br />
            <a class="menulinks" href="upload_klanten.php">Upload Klanten</a>
            <br />
            <br />
            <a class="menulinks" href="upload_klanten.php">Upload Producten</a>
            </div>
        </div>
    </div>

    <script>
        /* Looped door alle dropdown buttons om te toggelen tussen verborgen en getoonde dropdown content */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
        });
        }
    </script>

    <p class="py-0 text-center">
    <div class="rcover">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
    <form action="voeg_betaling_toe.php" method="post">
    <input type="text" class="form-control" name="status" placeholder="status"
            value="<?php echo isset($_POST["status"]) ? htmlentities($_POST["status"]) : ''; ?>" required /><br>
        <span>
            <?php 
                    echo ((isset($msg) && $msg != '') ? htmlentities($msg) ." <br>" : '');
                    echo ((isset($pwdError) && $pwdError != '') ? htmlentities($pwdError) ." <br>" : '')
                ?>
        </span>

        <input type="submit" class="btn btn-primary btn-block" name="submit" value="Betaling Status Toevoegen" />
        <span><?php echo ((isset($missingFieldError) && $missingFieldError != '') ? htmlentities($missingFieldError) : '')?></span>
    </form>

</body>

</html>