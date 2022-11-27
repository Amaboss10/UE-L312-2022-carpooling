<?php declare(strict_types = 1);
include_once 'index/header.php';

use App\Controllers\ReservationsController;
use App\Services\ReservationsService;

require __DIR__ . '/vendor/autoload.php';
include_once 'index/header.php';
$controller = new ReservationsController();
echo $controller->getReservation();

$reservationsService = new ReservationsService();
$reservations = $reservationsService->getReservations();
?>
<br>
<table class="form">
    <tr>
        <td>
            <form method="post" action="reservations_crud.php" name ="reservationCreateForm">
                <table class="form-control" id="in_1">
                    <tr>
                        <td class="title" >
                            <h1>Création d'une réservation</h1>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="idreservation">Identifiant :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="idreservation">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="date">Date de départ :</label>  
                        </td>
                        <td>
                        <input type="date" class="form-control" name="date"
                        value="2022-11-25"
                        min="2018-01-01" max="2024-12-31">
                        </td>                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="departure_time">Heure de départ :</label>  
                        </td>
                        <td>
                            <input type="time" class="form-control" name="departure_time"
                            min="00:00" max="24:00" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="arriving_time">Heure d'arrivée :</label>  
                        </td>
                        <td>
                            <input type="time" class="form-control" name="arriving_time"
                            min="00:00" max="24:00" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="place_of_departure">Lieu de départ :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="place_of_departure">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="arrival_point">Point d'arrivée :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="arrival_point">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                                <input type="submit" class="button" value="Créer">
                            <br>
                        </td>
                    </tr> 
                    
                    <tr>
                        <td>
                            <?php echo $controller->createReservation(); ?>
                        </td>
                    </tr>          
                </table>
            </form>
        </td>

        <td>
            <form method="post" action="reservations_crud.php" name ="reservationUpdateForm">
                <table class="form-control" id='in-3'>
                    <tr>
                        <td>
                            <h1>Mise à jour d'une réservation</h1>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tbid">Réservation :</label>
                        </td>
                        <td>
                            <select name="tbid" class="form-control" id="reservation-select">
                                <option value="" selected disabled>Choisir une réservation</option>
                                <?php foreach ($reservations as $reservation) { ?>
                                        <?php $reservationName = '#' . $reservation->getId() . ' a reservé pour le' . $reservation->getDate() . 'pour aller de ' . $reservation->getPlace_of_departure() . 'à' . $reservation->getArrival_point() . 'heure de départ' . $reservation->getDeparture_time() . "heure d'arrivée" . $reservation->setArriving_time(); ?>
                                        <!--<input type="checkbox" name="reservations[]" value="<?php // echo $reservation->getId();?>"><?php // echo $reservationName;?>-->
                                        <option  value="<?php echo $reservation->getId(); ?>"><?php echo $reservationName; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="idreservation">Identifiant :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="idreservation">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="date">Date de départ :</label>  
                        </td>
                        <td>
                        <input type="date" class="form-control" name="date"
                        value="2022-11-25"
                        min="2018-01-01" max="2024-12-31">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="departure_time">Heure de départ :</label>  
                        </td>
                        <td>
                            <input type="time" class="form-control" name="departure_time"
                            min="00:00" max="24:00" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="arriving_time">Heure d'arrivée :</label>  
                        </td>
                        <td>
                            <input type="time" class="form-control" name="arriving_time"
                            min="00:00" max="24:00" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="place_of_departure">Lieu de départ :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="place_of_departure">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="arrival_point">Point d'arrivée :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="arrival_point">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <br>
                                <input type="submit" class="button" value="Mise à jour">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $controller->updateReservation(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>

        <td>
            <form method="post" action="reservations_crud.php" name ="reservationDeleteForm">
                <table class="form-control" id='in_2'>
                    <tr>
                        <td>
                            <h1>Supression d'une réservation</h1>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="id">Réservation :</label>
                        </td>
                        <td>
                            <select name="iddel" class="form-control" id="reservation-select">
                                <option value="" selected disabled>Choisir une réservation</option>
                                <?php foreach ($reservations as $reservation) { ?>
                                        <?php $reservationName = '#' . $reservation->getId() . ' a reservé pour le' . $reservation->getDate() . 'pour aller de ' . $reservation->getPlace_of_departure() . 'à' . $reservation->getArrival_point() . 'heure de départ' . $reservation->getDeparture_time() . "heure d'arrivée" . $reservation->setArriving_time(); ?>
                                        <!--<input type="checkbox" name="reservations[]" value="<?php // echo $reservation->getId();?>"><?php // echo $reservationName;?>-->
                                        <option  value="<?php echo $reservation->getId(); ?>"><?php echo $reservationName; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <br>
                                <input type="submit" class="button" value="Supprimer">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $controller->deleteReservation(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>