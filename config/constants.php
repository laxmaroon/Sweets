<?php

    //start session
    session_start();

    //Constants
    define('SITEURL','http:localhost/dbmsXweb/');
    define('LOCALHOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DBNAME','sweet_database');

    $con = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DBNAME) or die(mysqli_error());
?>