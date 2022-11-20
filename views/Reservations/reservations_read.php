<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();  //Le controller qui va gerer toutes les actions
echo $controller->getReservations();