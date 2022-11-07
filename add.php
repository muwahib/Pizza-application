<?php
//post the form
// echo "<pre>";
// print_r($_POST);
    
// echo "</pre>";
// die();
$title = $email = $ingredients = '';
$errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');
if (isset($_POST['submit'])) {

    //check email
    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required <br/>';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors['email'] = 'email must be a valid email address';
        }
    }

    //check title
    if (empty($_POST['title'])) {
        $errors['title'] = 'An title is required <br/>';
    } else {
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
          $errors['title'] = 'title must be letters and spaces only';
        }
    }

    //check ingredients
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'At least one ingredient is required <br/>';
    } else {
       $ingredients = $_POST['ingredients'];
       if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
        $errors['ingredients'] = 'Ingredients must be a comma separated list';
    }
    } // this the end of POST check

    if (array_filter($errors)){
        //echo 'errors in the form';
    } else {
        //echo 'form is valid';
        header('location: index.php');
    }

};

?>


<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a pizza</h4>
    <form action="add.php" class="white" method="POST">
        <label>Your Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email'] ?></div>
        <label>Pizza title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"><?php echo $errors['title'] ?></div>
        <label>Ingredients(comma seprated):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $errors['ingredients'] ?></div>
        <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>




<?php include('templates/footer.php'); ?>

</html>