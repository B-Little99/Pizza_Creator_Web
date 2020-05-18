<?php

include('database_connection.php');

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

                <?php foreach($pizzas as $pizza): ?>

                    <div class="column">
                        <div class="columnWrap">
                            <h4> <?php echo htmlspecialchars($pizza['title']); ?> </h6>
                            <div class="ingredients"> 
                                <ul class="ingredients">  
                                    <?php foreach(explode(',', $pizza['ingredients']) as $ingredient): ?>
                                        <li>
                                            <?php echo htmlspecialchars(ucwords($ingredient)) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>  
                            </div>
                            <div class="moreInformation">
                                <a href="details.php?id=<?php echo $pizza['id']?>">More info</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <?php include('footer.php') ?>

</html>

