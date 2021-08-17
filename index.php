<?php

    include 'db.php';
    include 'validation.php';

    $db = new db();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])){
        $fields = ['gebruikersnaam', 'wachtwoord'];
 
        $obj = new Helper();

        $fields_validated = $obj->field_validation($fields);
    
    if($fields_validated){
      $gebruikersnaam = trim($_POST['gebruikersnaam']);
      $wachtwoord = trim($_POST['wachtwoord']);

      $sql = " SELECT * FROM gebruikers WHERE gebruikersnaam=:gebruikersnaam";
        
      $named_placeholder = ['gebruikersnaam'=>$_POST['gebruikersnaam']];

      $loginError = $db->login_med($sql, $named_placeholder, $_POST);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SpaCity Automatiserings Applicatie</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php">
                    <img src="logo-spa-city.svg" alt="Logo" width="220" height="80">
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <p class="nav navbar-text">Automatiserings Applicatie</p>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span
                                class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">

                                        <form action="index.php" method="post">

                                            <div class="form-group">
                                                <label for="gebruikersnaam">Gebruikersnaam :</label>
                                                <input class="form-control" type="text" name="gebruikersnaam" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="wachtwoord">Wachtwoord :</label>
                                                <input class="form-control" type="password" name="wachtwoord" required>
                                            </div>
                                    </div>

                                    <span><?php echo ((isset($loginError) && $loginError != '') ? $loginError ."<br>" : '')?></span>

                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block" value="Login">Login</button>
                                    </div>

                                    </form>
                                </div>
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
            <div class="col-2" id="homemenu2">
            <br>
            <h4 class="menu">Menu</h4>
            <br />
            <a class="menulinks" href="index.php">Home</a>
            <br />
        </div>
    </div>
         <img class="chess" src="">
            </div>
        </div>
    </div>

</body>

</html>