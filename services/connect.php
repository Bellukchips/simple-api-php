<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "laundry_11985";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
    die ("Koneksi gagal".mysqli_connect_error());
}
