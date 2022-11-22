<?php declare(strict_types = 1);

namespace App\Services;

use App\Entities\Reservation;

class ReservationsService
{
    /**
     * create Reservation | update Reservation.
     */
    public function setReservations(?string $idReservation, \DateTime $date, string $departure_time, string $arriving_time, string $place_of_departure, string $arrival_point): bool
    {
        $reservationId = false;

        $dataBaseService = new DataBaseService();
        $reservationDateTime = new \DateTime($date);
        if (empty($idReservation)) {
            $reservationId = $dataBaseService->createReservation($date, $departure_time, $arriving_time, $place_of_departure, $arrival_point);
        } else {
            $dataBaseService->updateReservation($idReservation, $date, $departure_time, $arriving_time, $place_of_departure, $arrival_point);
            $reservationId = $idReservation;
        }

        return $reservationId;
    }

        /**
         * Return Reservations.
         */
        public function getReservations(): array
        {
            $reservations = [];
            $dataBaseService = new DataBaseService();
            $reservationsDTO = $dataBaseService->getReservations();
            if (!empty($reservationsDTO)) {
                foreach ($reservationsDTO as $reservationDTO) {
                    $reservation = new Reservation();
                    $reservation->setId($reservationDTO['idReservation']);
                    $reservation->setDate($reservationDTO['date']);
                    $reservation->setPlace_of_departure($reservationDTO['place_of_departure']);
                    $reservation->setArrival_point($reservationDTO['arrival_point']);
                    $reservation->setDeparture_time($reservationDTO['departure_time']);
                    $reservation->setArriving_time($reservationDTO['arriving_time']);

                    $reservations[] = $reservations;
                }
            }

            return $reservations;
        }

    /**
     * Delete getReservations.
     */
    public function deleteReservations(string $idReservation): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();

        return $dataBaseService->deleteReservation($idReservation);
    }
}
