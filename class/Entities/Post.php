<?php namespace App\Entities;

class Post
{
    private $id;
    private $description;
    private $price;
    private $date;
    private $number_of_passengers;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function getNumber_of_passengers(): int
    {
        return $this->number_of_passengers;
    }

    public function setNumber_of_passengers(int $number_of_passengers): void
    {
        $this->number_of_passengers = $number_of_passengers;
    }
}
