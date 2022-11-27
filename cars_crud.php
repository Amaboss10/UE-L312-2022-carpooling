<?php declare(strict_types = 1);
include_once 'index/header.php';

use App\Controllers\CarsController;
use App\Services\CarsService;

require __DIR__ . '/vendor/autoload.php';
$controller = new CarsController();
$carsService = new CarsService();
$cars = $carsService->getCars();
echo $controller->getCars();
?>
<br>
<table class="form">
    <tr>
        <td>
            <form method="post" action="cars_crud.php" name ="carCreateForm">
                <table class="form-control" >
                    <tr>
                        <td>
                            <h1>Création d'une voiture</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="idcar">Identifiant :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="idcar">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="numberplate">Plaque d'immatriculation :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="numberplate">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="brand">Marque :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="brand">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="model">Modèle :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="model">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="type">Type :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="type">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="color">Couleur :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="color">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="year">Années :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="year">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <br>
                                <input type="submit" class="button" value="Créer">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $controller->createCar(); ?>
                        </td>
                    </tr>          
                </table>
            </form>
        </td>

        <td>
            <form method="post" action="cars_crud.php" name ="carUpdateForm">
                <table class="form-control">
                    <tr>
                        <td>
                            <h1>Mise à jour d'une voiture</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="idup">Voiture :</label>
                        </td>
                        <td>
                            <select name="idup" class="form-control" >
                                <option value="" selected disabled>Choisir une voiture</option>
                                    <?php foreach ($cars as $car) { ?>
                                        <?php $carName = $car->getId() . '' . $car->getNumberplate() . '' . $car->getBrand() . ' ' . $car->getModel() . ' - ' . $car->getType() . '-' . $car->getColor() . $car->getYear(); ?>
                                        <option  value="<?php echo $car->getId(); ?>"><?php echo $carName; ?></option>
                                    <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="idcar">Identifiant :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="idcar">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="numberplate">Plaque d'immatriculation :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="numberplate">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="brand">Marque :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="brand">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="model">Modèle :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="model">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="type">Type :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="type">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="color">Couleur :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="color">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="year">Années :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="year">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <br>
                                <input type="submit" class="button" value="Mise à jour">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $controller->updateCar(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
        <td>


            <form method="post" action="cars_crud.php" name ="carDeleteForm">
                <table class="form-control" >
                    <tr>
                        <td>
                            <h1>Supression d'une voiture</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="iddel">Voiture :</label>
                        </td>
                        <td>
                            <select name="iddel" class="form-control" >
                                <option value="" selected disabled>Choisir une voiture</option>
                                <?php foreach ($cars as $car) { ?>
                                        <?php $carName = $car->getId() . '' . $car->getNumberplate() . '' . $car->getBrand() . ' ' . $car->getModel() . ' - ' . $car->getType() . '-' . $car->getColor() . $car->getYear(); ?>
                                        <option  value="<?php echo $car->getId(); ?>"><?php echo $carName; ?></option>
                                    <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <br>
                                <input type="submit" class="button" value="Supprimer">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $controller->deleteCar(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>