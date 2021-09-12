<?php

    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
    }

    include 'db.php';
    include 'validation.php';

    $db = new db();
    
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
            </button>
            <div class="dropdown-container">
            <br />
            <br />
            <a class="menulinks" href="overzicht_status_betalingen.php">Overzicht Betalingen</a>
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

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Uploaden <b>Klantenbestand</b></h2>
                        </div>
                    </div>
                </div>
    <table class="table table-striped table-hover">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">

    <tr>
        <td width="20%">Select file</td>
        <td width="80%"><input type="file" name="file" id="file" /></td>
    </tr>

    <tr>
        <td>Submit</td>
        <td><input type="submit" name="submit" /></td>
    </tr>

        </form>
    </table>

    <?php

    if ( isset($_POST["submit"]) ) {

    if(!empty(isset($_FILES["file"]))) {
        if (($fp = fopen($_FILES["file"]["tmp_name"], "r")) !== FALSE) {
        ?>
    
    <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Klanten <b>Bestand</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <form method="post">
                            <input type="submit" name="uploaden" class="button"><i class="material-icons">&#xE147;</i> <span>Voeg Klanten Toe</span> </input><div> </div>    
                        </form>
                        <form method="post" action="overzicht_klanten.php" class="row">
                        </form>						
                    </div>
                </div>
            </div>
    <table class="table table-striped table-hover">
    <?php
        $i = 0;
        while (($row = fgetcsv($fp)) !== false) {
            $class ="";
            if($i==0) {
            $class = "header";
            }
            ?>
            <tr>
                <td class="<?php echo $class; ?>"><?php echo $row[0]; ?></td>
                <td class="<?php echo $class; ?>"><?php echo $row[4]; ?></td>
                <td class="<?php echo $class; ?>"><?php echo $row[9]; ?></td>
                <td class="<?php echo $class; ?>"><?php echo $row[11]; ?></td>
            </tr>
        <?php
            $i ++;
        }
        fclose($fp);
        ?>
        </table>
    <?php
        $response = array("type" => "success", "message" => "Bestand succesvol geupload!");
        } else {
            $response = array("type" => "error", "message" => "Unable to process CSV");
        }

        function csvToArray($filename = '', $delimiter = ','){

            if (!file_exists($filename) || !is_readable($filename)) {
                return false;
            }

            $header = NULL;
            $result = array();
            if (($handle = fopen($filename, 'r')) !== FALSE) {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
                    if (!$header)
                        $header = $row;
                    else

                        $result[] = array_combine($header, $row);
                }
                fclose($handle);
            }
    return $result;
}

// Insert data into database   
    
    }
}
    ?>
    </div>
    <?php if(!empty($response)) { ?>
    <div class="response <?php echo $response["type"]; ?>
        ">
        <?php echo $response["message"]; ?>
    </div>
    <?php } ?>


    <?php

    if(isset($_POST['submit'])){
        
        // Allowed mime types
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        
        // Validate whether selected file is a CSV file
        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
            
            // If the file is uploaded
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                
                // Open uploaded CSV file with read-only mode
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                
                // Skip the first line
                fgetcsv($csvFile);
                
                // Parse data from CSV file line by line
                while(($line = fgetcsv($csvFile)) !== FALSE){
                    
                    // Get row data
                    $naam  = $line[0];
                    $adres = "blabla";
                    $postcode = $line[11];
                    $plaats = $line[9];
                    $telefoonnummer = 0;
                    $email = $line[4];
                    $betalingen_id = 1;
                    $factuur_id = 1;
                    $created_at = $updated_at = date('Y-m-d H:i:s');

                    $sql = "INSERT INTO klanten
                    VALUES (NULL, '".$naam."', '".$adres."', '".$postcode."', '".$plaats."', '".$telefoonnummer."', '".$email."'
                            , '".$betalingen_id."', '".$factuur_id."', '".$created_at."', '".$updated_at."')";

                    $named_placeholder = [
                        'naam'=> $naam,
                        'adres'=> $adres,
                        'postcode'=> $postcode,
                        'plaats'=> $plaats,
                        'telefoonnummer'=> $telefoonnummer,
                        'email'=> $email,
                        'betalingen_id'=> $betalingen_id,
                        'factuur_id'=> $factuur_id,
                        'created_at'=> $created_at,
                        'updated_at'=> $updated_at
                    ];

                        $db = new db();
                        $db->insert_klanten($sql, $named_placeholder);
                }
                
                // Close opened CSV file
                fclose($csvFile);
                
                $qstring = '?status=succ';
            }else{
                $qstring = '?status=err';
            }
        }else{
            $qstring = '?status=invalid_file';
        }
    }
    ?>
</body>

</html>