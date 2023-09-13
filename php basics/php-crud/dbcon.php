<?php
$con = mysqli_connect("localhost", "root", "", "php_dev");

if (!$con) {
    die('Connection Failed' . mysqli_connect_errno());
}
