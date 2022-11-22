<?php declare(strict_types = 1);

namespace App\Services;

use App\Entities\Car;

class CarsService
{
    /**
     * Create a car / update CAr.
     */
    public function setCar(?string $idCAR, string $numberplate, string $brand, string $model, string $type, string $color, int $year): bool
    {
        $carId = false;
        $dataBaseService = new DatabaseService();
        if (empty($idCAR)) {
            $carId = $dataBaseService->createCar($numberplate, $brand, $model, $type, $color, $year);
        } else {
            $dataBaseService->updateCar($idCAR, $numberplate, $brand, $model, $type, $color, $year);
            $carId = $idCAR;
        }

        return $carId;
    }

    /**
     * Return Cars.
     */
    public function getCars(): array
    {
        $cars = [];
        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO);
            $car = new Car();
            $car->setId($carDTO['idCar']);
            $car->setNumberplate($carDTO['numberplate']);
            $car->setBrand($carDTO['brand']);
            $car->setModel($carDTO['model']);
            $car->setType($carDTO['type']);
            $car->setColor($carDTO['color']);
            $car->setYear($carDTO['year']);
            $cars[] = $car;
        }

        return $cars;
    }

    /**
     * Delete car.
     */
    public function deleteCar(string $idCar): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();

        return $dataBaseService->deleteCar($idCar);
    }
}
