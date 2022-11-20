<?php declare(strict_types = 1);

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->deleteReservations();
?>

<p>Supression d'un utilisateur</p>
<form method="post" action="reservations_delete.php" name ="rerservationsDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une reservations">
</form>