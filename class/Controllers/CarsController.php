<?php declare(strict_types = 1);

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])
        && isset($_POST['numberplate'])
        && isset($_POST['brand'])
        && isset($_POST['model'])
        && isset($_POST['type'])
        && isset($_POST['color'])
        && isset($_POST['year'])
        ) {
            // Create the car
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                null,
                $_POST['id'],
                $_POST['numberplate'],
                $_POST['brand'],
                $_POST['model'],
                $_POST['type'],
                $_POST['color'],
                $_POST['year']
            );
            if ($isOk) {
                $html = 'voiture créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la voiture.';
            }
        }

        return $html;
    }

    // Return the html for the read action

    public function getCars(): string
    {
        $html = '';

        // Get all cars:
        $carsService = new CarsService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {
            $html .=
            '#' . $car->getId . ' ' .
            $car->getNumberplate() . ' ' .
            $car->getBrand() . ' ' .
            $car->getModel() . ' ' .
            $car->getType() . ' ' .
            $car->getColor() . ' ' .
            $car->getYear() . '<br />';
        }

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])
            && isset($_POST['numberplate'])
            && isset($_POST['brand'])
            && isset($_POST['model'])
            && isset($_POST['type'])
            && isset($_POST['color'])
            && isset($_POST['year'])) {
            // update the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                $_POST['numberplate'],
                $_POST['brand'],
                $_POST['model'],
                $_POST['type'],
                $_POST['color'],
                $_POST['year'],
            );
            if ($isOk) {
                $html = 'la voiture est mis à jour avec succès';
            } else {
                $html = 'erreur lors de la mis à jour de la voiture';
            }
        }

        return $html;
    }

    /**
     * delete an car.
     */
    public function deleteCar(): string
    {
        $html = '';
        // if the form have been submitted :
        if (isset($_POST['id'])) {
            // delete the car
            $carsService = new CarsService();
            $isOk = $carsService->deleteCar($_POST['id']);
            if ($isOk) {
                $html = 'la voiture a été supprimé avec succès';
            } else {
                $html = 'Erreur lors de la suppression de la voiture';
            }
        }

        return $html;
    }
}
