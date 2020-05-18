<?php
include('database_connection.php');

if(isset($_POST['delete'])) {
    $id_delete = mysqli_real_escape_string($connection, $_POST['id_delete']);

    $sql = "DELETE FROM Pizzas WHERE id = $id_delete";

    if(mysqli_query($connection, $sql)){
        header('Location: index.php');
    } else {
        echo "Query error: " . mysqli_error($connection);
    }
}

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    //This is the SQL command we want to run in the database 
    $sql = "SELECT * FROM Pizzas WHERE id = $id";

    // This is the result of running the above SQL query
    $result = mysqli_query($connection, $sql); 

    // The information is then stored in an associative array.
    $pizza = mysqli_fetch_assoc($result);

    // Usual freeing/closing of result and connect to free up memory.
    mysqli_free_result($result);
    mysqli_close($connection);
}
?>

<!DOCTYPE html>

    <?php include('header.php') ?>

    <div class="detailsContainer">
        <h2>Details</h2>

        <?php if($pizza): ?>

            <div class="detailsInfoContainer">
                <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
                <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
                <p>Created on: <?php echo htmlspecialchars($pizza['created_at']); ?> </p>
                <p id = "detailedIngredients">Ingredients: <?php echo htmlspecialchars($pizza['ingredients']); ?> </p>

                <!-- Form to delete Pizza if user wishes -->
                <form action = "details.php" method = "POST">
                    <input type="hidden" name = "id_delete" value = "<?php echo $pizza['id']?>">
                    <input type="submit" name = "delete" value = "Delete" class = "button">
                </form>
            </div>

        <?php else: ?>
            
            <h4>Sorry, there is not a pizza with the id of <?php echo htmlspecialchars($id);?>.</h4>

        <?php endif; ?>
    </div>

    <?php include('footer.php') ?>

</html>