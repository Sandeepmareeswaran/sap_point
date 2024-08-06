<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='stflog';
$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if ($con){
    //echo "connection successful";
}
else {
    die(mysqli_error($con));
}
?>