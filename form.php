<?php

    $errors = array("email" => "", "name" => "", "ingredient" => "");

    $name = '';
    $email = '';
    $ingredient = '';

    if(isset($_POST['Submit'])){
        if (empty($_POST['email'])){
            $errors['email'] = "An email is required.";
            echo htmlspecialchars($_POST['email']);
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "The email inputted must be valid";
            }
        }
        if (empty($_POST['name'])){
            $errors['name'] = "A name is required.";
        } else {
            $name = $_POST['name'];
            if(!preg_match( '/^[a-zA-Z\s]+$/', $name)){
                $errors['name'] = "You must be inputting a name that only includes letters and spaces";
            }
        }
        if (empty($_POST['ingredient'])){
            $errors['ingredient'] = "An ingredient is required.";
        } else {
            $ingredient = $_POST['ingredient'];
            if(!preg_match( '/^([a-zA-Z\s]+[a-zA-Z\s]*)(,\s*[a-zA-Z]*[a-zA-Z\s]*)*$/', $ingredient)){
                $errors['ingredient'] = "You must input ingredients that only includes letters and spaces";
            }
        }
        if (array_filter($errors)){

        } else {
            header('Location: index.php');
        }
    }

?>


<!DOCTYPE html>

    <?php include('header.php') ?>

    <div id="wrapper">
        <h2>Send us your pizza recipe!</h2>
        <div class="formWrapper">
            <form action="form.php" method="POST" id = "usrform">
                <input type="text" placeholder = "Pizza Name" name = "name" value = "<?php echo htmlspecialchars($name) ?>">
                <input type="text" placeholder = "Email" name = "email" value = "<?php echo htmlspecialchars($email) ?>">
                <input name="ingredient" form="usrform" name = "ingredient" placeholder = "Ingredients (comma separated)..." value = "<?php echo htmlspecialchars($ingredient) ?>">
                <input type="submit" name = "Submit" value = "Submit" class = "button">
            </form>
            <div><p><?php echo $errors['email'] . "<br><br>" . $errors['name'] . "<br><br>" . $errors['ingredient'];?></p></div>
        </div>
    </div>

    <?php include('footer.php') ?>
</html>
