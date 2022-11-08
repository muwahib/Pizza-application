<?php

include('config/db_connect.php');

//write query fro all pizzas
$sql = 'SELECT Title, Ingredients, ID FROM pizzas ORDER BY Create_at';

//make query & get result
$result = mysqli_query($conn, $sql);
// echo "<pre>";

// print_r($result);


// echo "</pre>";
//die();

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

// explode(',', $pizzas[0]['ingredients']);

?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza): ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <img src="img/pizza.svg" class="pizza">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['Title']); ?></h6>
                        <ul>
                            <?php foreach (explode(',', $pizza['Ingredients']) as $ing): ?>
                                <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?ID=<?php echo $pizza['ID']?>" class="brand-text">more info</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if(count($pizzas) >= 3):?>
            <!-- <p>there are 2 or more pizzas </p> -->
        <?php else: ?>
            <!-- <p> there are less than 3 pizzas </p> -->
        <?php endif; ?>

    </div>
</div>


<?php include('templates/footer.php'); ?>

</html>