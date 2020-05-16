<?php

// Storing the connection to the database in the $connection variable.
$connection = mysqli_connect('localhost', 'Brand', 'myTEST123469', 'Brandons_pizzas');

if(!$connection){
    echo 'There was an error connecting to the database';
}

// query for all pizzas

$sql = 'SELECT title, id, ingredients FROM Pizzas ORDER BY created_at';

// make query and get result
$result = mysqli_query($connection, $sql);

// Get the result as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// closing the connection
mysqli_close($connection);

?>


<!DOCTYPE html>

    <?php include('header.php') ?>

    <div class="pizzaWrapper">
        <h3>Pizza's to order</h3>
        <div class="pizzaContainer">
            <div class="row">

                <?php foreach($pizzas as $pizza){ ?>

                    <div class="column">
                        <h4> <?php echo htmlspecialchars($pizza['title']); ?> </h6>
                        <div class="ingredients"> <?php echo htmlspecialchars($pizza['ingredients']); ?> </div>
                        <div class="moreInformation">
                            <a href="#">More info</a>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>







    <?php include('footer.php') ?>




</html>

