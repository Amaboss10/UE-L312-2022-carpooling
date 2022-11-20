<?php

namespace App\Entities;

class Car
{
    private $id;
    private $numberplate;
    private $brand;
    private $model;
    private $type;
    private $color;
    private $year;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getNumberplate(): string
    {
        return $this->numberplate;
    }

    public function setNumberplate(string $numberplate): void
    {
        $this->numberplate = $numberplate;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setcolor(string $color): void
    {
        $this->color = $color;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }
}
