<?php
include('config/db_connect.php');

if(isset($_POST['delete'])){
    //get acctual id 
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE ID = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        //success
        header('location: index.php');
    } {
        //failure
        echo 'query error: ' . mysqli_error($conn);
    }

}

//check get request
if(isset($_GET['ID'])){
    $id = mysqli_real_escape_string($conn, $_GET['ID']);

    //make sql
    $sql = "SELECT * FROM pizzas WHERE ID = $id";

    //get the query result 
    $result = mysqli_query($conn, $sql);

    //fetch the result in array format
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
   
};

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

    <div class="container center">
        <?php if($pizza): ?>
            <h4><?php echo htmlspecialchars($pizza['Title']); ?></h4>
            <p>Created by: <?php echo htmlspecialchars(($pizza['Email']));?></p>
            <p><?php echo date($pizza['Create_at']); ?></p>
            <h5>Ingredients:</h5>
            <p><?php echo htmlspecialchars($pizza['Ingredients']); ?></p>

            <!-- delete form  -->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $pizza['ID']?>">
                <input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
            </form>

        <?php else: ?>
            <h5>No such pizza exists!</h5>
        <?php endif; ?>

    </div>

<?php include('templates/footer.php'); ?>
</html>