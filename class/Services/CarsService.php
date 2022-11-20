<?php
namespace App\Services;

use App\Entities\Car;


class CarsService {
    /**
 * Create a car / update CAr 
 */

public function setCar(?string $idCAR, string $numberplate, string $brand,string $model, string $type, string $color , string $year ){
    $carId='';
    $dataBaseService = new DatabaseService();
    if(empty($idCAR)){
        $carId = $dataBaseService->createCar( $numberplate,  $brand, $model,  $type, $color , $year);
    }
    else{
        $dataBaseService->updateCar($idCAR, $numberplate, $brand, $model,  $type, $color , $year);
        $carId=$idCAR;
    }
    return $carId;
}

/**
 * Return Cars
 */

public function getCars(): array{
    $cars =[];
    $dataBaseService=new DataBaseService();
    $carsDTO=$dataBaseService->getCars();
    if(!empty($carsDTO)){
foreach($carsDTO as $carDTO);
$car ->setidCar($carDTO['idCar']);
$car ->setnumberplate($caDTOr['numberplate']);
$car ->setbrand($caDTOr['brand']);
$car ->setmodel($carDTO['model']);
$car ->settype($carDTO['type']);
$car ->setcolor($carDTO['color']);
$car ->setyear($carDTO['year']);
$cars[]=$car;

    }
    return $cars;
     }
/**
 * Delete car
 */
public function deleteCar(string $idCar): bool
{
    $isOk = false;

    $dataBaseService = new DataBaseService();
    $isOk = $dataBaseService->deleteCar($idCar);

    return $isOk;
}
}