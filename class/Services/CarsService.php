<?php declare(strict_types = 1);

namespace App\Services;

use App\Entities\Car;
use App\Entities\Post;

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

    public function getCarsPosts(string $carId): array
    {
        $carsPosts = [];

        $dataBaseService = new DataBaseService();

        //get relation car and post 
        $carsPostsDTO = $dataBaseService->getCarsPosts($carId);
        if (!empty($carsPostsDTO)) {
            foreach($carsPostsDTO as $carPostDTO) {
            $post = new Post();
            $post->setId($carPostDTO['id']);
            $post->setDescription($carPostDTO['description']);
            $post->setPrice($carPostDTO['price']);
            $post->setDate($carPostDTO['date']);
            $post->setNumber_of_passengers($carPostDTO['number_of_passengers']);
            
            $carsPosts [] = $post; 
            
            }

        }

        return $carsPosts;

    }

    public function setCarsPosts ( string $carId, string $postId ) : bool
    
    {
        $isOk = false;
        
        $dataBaseService = new DataBaseService();

        return $dataBaseService->setCarsPosts($carId, $postId);
        
    }
}


