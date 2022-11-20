<?php declare(strict_types = 1);

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCar();
?>

<p>Mise à jour d'une voiture</p>
<form method="post" action="cars_update.php" name ="carsUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="brand">Marque :</label>
    <input type="text" name="brand">
    <br />
    <label for="model">Modèle :</label>
    <input type="text" name="model">
    <br />
    <label for="color">Couleur :</label>
    <input type="text" name="color">
    <br />
    <label for="nbrSlots">Nombre de feintes :</label>
    <input type="text" name="nbrSlots">
    <br />
    <input type="submit" value="Modifier la voiture">
</form>