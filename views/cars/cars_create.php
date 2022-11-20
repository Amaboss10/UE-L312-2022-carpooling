<?php declare(strict_types = 1);

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->createCar();

?>


<p>Ajout d'une voiture</p>
<form method="post" action="cars_create.php" name ="carsCreateForm">
    <label for="brand">Marque :</label>
    <input type="text" name="brand">
    <br />
    <label for="model">Modèle :</label>
    <input type="text" name="model">
    <br />
    <label for="color">Couleur :</label>
    <input type="text" name="color">
    <br />
    <label for="nbrSlots">Nombre de feintes</label>
    <input type="text" name="nbrSlots">
    <br />
    <br />
    <input type="submit" value="Ajouter la voiture">
</form>