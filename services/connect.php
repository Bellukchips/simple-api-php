<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "laundry";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
    die ("Koneksi gagal".mysqli_connect_error());
}
