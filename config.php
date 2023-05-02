<?php
$server="localhost";
$username="root";
$password="join2k22";
$dbname="nigma";

$conn= mysqli_connect( $server , $username , $password , $dbname);
if(!$conn)
{
    echo "Connection Error:".mysql_connect_error();
    
}



?>