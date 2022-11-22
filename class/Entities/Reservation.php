<?php declare(strict_types = 1);

namespace App\Entities;

class Reservation
{
    private $id;
    private $date;
    private $departure_time;
    private $arriving_time;
    private $place_of_departure;
    private $arrival_point;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function getDeparture_time(): string
    {
        return $this->departure_time;
    }

    public function setDeparture_time(string $departure_time): void
    {
        $this->departure_time = $departure_time;
    }

    public function getArriving_time(): string
    {
        return $this->arriving_time;
    }

    public function setArriving_time(string $arriving_time): void
    {
        $this->arriving_time = $arriving_time;
    }

    public function getPlace_of_departure(): string
    {
        return $this->place_of_departure;
    }

    public function setPlace_of_departure(string $place_of_departure): void
    {
        $this->place_of_departure = $place_of_departure;
    }

    public function getArrival_point(): string
    {
        return $this->arrival_point;
    }

    public function setArrival_point(string $arrival_point): void
    {
        $this->arrival_point = $arrival_point;
    }
}
