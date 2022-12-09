<?php

function dbConnect()
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library_management_db";

    return mysqli_connect($server, $username, $password, $dbname);
}
