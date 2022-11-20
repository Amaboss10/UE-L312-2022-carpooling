<?php

namespace App\Services;

use App\Entities\Reservation;
use DateTime;


class ReservationsService{
    /**
     * create Reservation | update Reservation
     */
    public function setReservations(?string $idReservation, string $date, string $departure_time, string $arriving_time, string $place_of_departure, string $arrival_point){
    $reservationId='';

    $dataBaseService = new DataBaseService();
    $reservationDateTime = new DateTime($datereservation);
    if (empty($id)) {
        $reservationId=$dataBaseService->createReservation($date, $departure_time, $arriving_time, $place_of_departure, $arrival_point);
    } else {
        $dataBaseService->updateReservation($idReservation, $date, $departure_time, $arriving_time, $place_of_departure, $arrival_point);
        $reservationId=$idReservation;
    }
    return $reservationId;
}
        /**
         * Return Reservations
         */
        public function getReservations(): array{
            $reservations=[];
            $dataBaseService= new DataBaseService();
            $reservationsDTO  = $dataBaseService ->getReservations();
            if(!empty($reservationsDTO)){
                foreach($reservationsDTO as $reservationDTO){
                    $reservation =new Reservation();
                    $reservation-> setidReservation($reservationDTO['idReservation']);
                    $reservation-> setdate($reservationDTO['date']);
                   $reservation-> setplace_of_departure($reservationDTO['place_of_departure']);
                    $reservation-> setarrival_point($reservationDTO['arrival_point']);
                    $date = new DateTime($reservationDTO['departure_time']);
                    if ($date !== false) {
                        $reservation->setdeparture_time($date);
                    }
                    $date_arr = new DateTime($reservationDTO['arriving_time']);
                    if ($date_arr !== false) {
                        $reservation->setdeparture_time($date_arr);
                    }
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
        $isOk = $dataBaseService->deleteReservations($id);

        return $isOk;
    }

    
}