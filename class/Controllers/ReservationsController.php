<?php declare(strict_types = 1);

namespace App\Controllers;

use App\Services\ReservationsService;

class ReservationsController
{
    /**
     * Return the html for the create action.
     */
    public function createReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])
        && isset($_POST['date'])
        && isset($_POST['departure_time'])
        && isset($_POST['arriving_time'])
        && isset($_POST['place_of_departure'])
        && isset($_POST['arrival_point'])
        ) {
            // Create the reservation
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->setReservations(
                null,
                $_POST['id'],
                $_POST['date'],
                $_POST['departure_time'],
                $_POST['arriving_time'],
                $_POST['place_of_departure'],
                $_POST['arrival_point']
            );
            if ($isOk) {
                $html = 'la reservation est créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la reservation.';
            }
        }

        return $html;
    }

    // Return the html for the read action

    public function getReservation(): string
    {
        $html = '';

        // Get all reservation:
        $reservationsService = new ReservationsService();
        $reservations = $reservationsService->getReservations();

        // Get html :
        foreach ($reservations as $reservation) {
            $html .=
            '#' . $reservation->getId() . ' ' .
            $reservation > \getdate() . ' ' .
            $reservation->getDeparture_time() . ' ' .
            $reservation->getArriving_time() . ' ' .
            $reservation->getPlace_of_departure() . ' ' .
            $reservation->getArrival_point() . '<br />';
        }

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])
            && isset($_POST['date'])
            && isset($_POST['departure_time'])
            && isset($_POST['arriving_time'])
            && isset($_POST['place_of_departure'])
            && isset($_POST['arrival_point'])) {
            // update the reservation :
            $reservationService = new ReservationsService();
            $isOk = $reservationService->setReservations(
                $_POST['id'],
                $_POST['date'],
                $_POST['departure_time'],
                $_POST['arriving_time'],
                $_POST['place_of_departure'],
                $_POST['arrival_point']
            );
            if ($isOk) {
                $html = 'la réservation est mis à jour avec succès';
            } else {
                $html = 'erreur lors de la mis à jour de la reservation';
            }
        }

        return $html;
    }

    /**
     * delete a reservation.
     */
    public function deleteReservation(): string
    {
        $html = '';
        // if the form have been submitted :
        if (isset($_POST['id'])) {
            // delete the car
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->deleteReservations($_POST['id']);
            if ($isOk) {
                $html = 'la reservation a été supprimé avec succès';
            } else {
                $html = 'Erreur lors de la suppression de la reservation';
            }
        }

        return $html;
    }
}
