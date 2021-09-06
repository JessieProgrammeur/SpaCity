<?php
function php_func($_FILES["file"]){
    $all_data = csvToArray($_FILES["file"]);
    foreach ($all_data as $data) {

        $sql = $db->import_klanten("INSERT INTO klanten (naam, postcode, plaats, email");

    }
}
php_func();
?>