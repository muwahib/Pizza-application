<?php
//post the form
if (isset($_POST['submit'])) {

    //check email
    if (empty($_POST['email'])) {
        echo 'An email is required <br/>';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'email must be a valid email address';
        }
    }

    //check title
    if (empty($_POST['title'])) {
        echo 'An title is required <br/>';
    } else {
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
            echo 'title must be letters and spaces only';
        }
    }

    //check ingredients
    if (empty($_POST['ingredients'])) {
        echo 'At least one ingredient is required <br/>';
    } else {
       $ingredients = $_POST['ingredients'];
       if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
        echo 'Ingredients must be a comma separated list';
    }
    } // this the end of POST check
};



?>


<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a pizza</h4>
    <form action="add.php" class="white" method="POST">
        <label>Your Email:</label>
        <input type="text" name="email">
        <label>Pizza title:</label>
        <input type="text" name="title">
        <label>Ingredients(comma seprated):</label>
        <input type="text" name="ingredients">
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>



<?php include('templates/footer.php'); ?>

</html>