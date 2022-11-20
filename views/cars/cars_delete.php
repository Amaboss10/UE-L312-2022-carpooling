<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->deleteCar();
?>

<p>Supression d'une voiture</p>
<form method="post" action="cars_delete.php" name ="carsDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une voiture">
</form>