<?php


// Storing the connection to the database in the $connection variable.
$connection = mysqli_connect('localhost', 'Brand', 'myTEST123469', 'Brandons_pizzas');

if(!$connection){
    echo 'There was an error connecting to the database';
}

?>