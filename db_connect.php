<?php

$con=new mysqli('localhost', 'root', '', 'wedding');

if(!$con){
    die(mysqli_error($con));
}

?>