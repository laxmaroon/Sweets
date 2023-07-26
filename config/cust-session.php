<?php

    session_start();

    define('LOCALHOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DBNAME','sweet_database');

    $con = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DBNAME) or die(mysqli_error());

?>