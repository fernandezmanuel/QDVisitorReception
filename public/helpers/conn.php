<?php
$host = "localhost";
$user = "root";
$pwd = "root";
$db = "qdvrdb";

// connect to database
$con = mysqli_connect($host, $user, $pwd, $db);

// check for connection errors
if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

// function to execute query and automatically check for errors
function query($sql) {
    $result = mysqli_query($GLOBALS['configuration'], $sql);
    if (!$result) {
        die(mysqli_error($GLOBALS['configuration']));
    }
    return $result;
}