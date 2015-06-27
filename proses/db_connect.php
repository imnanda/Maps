<?php
/**
 * Created by PhpStorm.
 * User: Jhoony
 * Date: 27-Jun-15
 * Time: 11:17 AM
 */
$host = "localhost";
$database = "atolmap";
$user = "root";
$password = "asdasd150494";
$koneksi=mysql_connect($host,$user,$password);
mysql_select_db($database,$koneksi);
if(!$koneksi)
    die("Error : ".mysql_error());