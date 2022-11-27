<?php
use App\Controllers\UsersController;
use App\Services\CarsService;
use App\Services\PostsService;
use App\Services\ReservationsService;
use App\Services\UsersService;

require __DIR__ . '/vendor/autoload.php';
include_once 'index/header.php';
$controller = new UsersController();

$usersService = new UsersService();
$users= $usersService->getUsers();

$carsService = new CarsService();
$cars = $carsService->getCars();

$PostsService = new PostsService();
$posts = $PostsService->getPost();

$reservationsService = new ReservationsService();
$reservations = $reservationsService->getReservations();
echo $controller->getUsers();
?>
<br>
<table class='form'>
    <tr>
        <td>
            <form method="post" action="users_crud.php" name ="userCreateForm">
                <table class='form-control' >
                    <tr>
                        <td>
                            <h1>Utilisateur</h1>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="firstname">Prénom :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="firstname">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="lastname">Nom :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="lastname">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="email">E-mail :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="email">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="birthday">Date de naissance :</label>
                        </td>
                        <td>
                        <input type="date" class="form-control" name="date"
                        value="2022-11-25"
                        min="2018-01-01" max="2024-12-31">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="cars">Voiture(s) :</label>
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
                            <br>
                                <input type="submit" class="button" value="Créer">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $controller->createUser(); ?>
                        </td>
                    </tr>         
                </table>
            </form>
        </td>
        <td>
            <form method="post" action="users_crud.php" name ="userUpdateForm">
                <table class='form-control'>
                    <tr>
                        <td>
                            <h1>Mise à jour d'un utilisateur</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="id">Utilisateur :</label>
                        </td>
                        <td>
                        <select name="id" class="form-control">
                                <option value="" selected disabled>Choisir un utilisateur</option>
                                <?php foreach ($users as $user): ?>
                                        <?php $userName ='#'. $user->getId(). ' | ' . $user->getFirstname() . ' ' . $user->getLastname();?>
                                        <!--<input type="checkbox" name="reservations[]" value="<?php //echo $reservation->getId(); ?>"><?php //echo $reservationName; ?>-->
                                        <option  value="<?php echo $user->getId(); ?>"><?php echo $userName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="firstname">Prénom :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="firstname">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="lastname">Nom :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="lastname">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="email">E-mail :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="email">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="birthday">Date de naissance :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="birthday" placeholder="format dd-mm-yyyy :">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="posts">Annonce(s) :</label>
                        </td>
                        <td>
                        <select name="post[]" class="form-control">
                                <option value="" selected disabled>Choisir une annonce</option>
                                <option value="0" >Aucune</option>
                                <?php foreach ($posts as $post): ?> 
                                    <?php $postName ='#'. $post->getId(). ' | ' . $post->getPrice() . '€ ' . $post->getDeparture().'➔'. $post->getDestination(); ?>

                                        <option  value="<?php echo $post->getId(); ?>"><?php echo $postName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                            <label for="reservations">Reservation(s) :</label>
                        </td>
                        <td>
                            <select name="reservations[]" class="form-control">
                                <option value="" selected disabled>Choisir une réservation</option>
                                <option value="0" >Aucune</option>
                                <?php foreach ($reservations as $reservation): ?>
                                        <?php $reservationName ='#'. $reservation->getId(). ' | ' . $reservation->getTitle() . ' Pour ' . $reservation->getnbrPassengers().' passager(s)'; ?>
                                        <!--<input type="checkbox" name="reservations[]" value="<?php //echo $reservation->getId(); ?>"><?php //echo $reservationName; ?>-->
                                        <option  value="<?php echo $reservation->getId(); ?>"><?php echo $reservationName; ?></option>
                                <?php endforeach; ?>
                            </select>
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
                            <?php echo $controller->updateUser(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
        <td>
            <form method="post" action="users_crud.php" name ="userDeleteForm">
                <table class='form-control'>
                    <tr>
                        <td>
                            <h1>Supression d'un utilisateur</h1>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="id">Utilisateur :</label>
                        </td>
                        <td>
                            <select name="iddel" class="form-control">
                                <option value="" selected disabled>Choisir un utilisateur</option>
                                <?php foreach ($users as $user): ?>
                                        <?php $userName ='#'. $user->getId(). ' | ' . $user->getFirstname() . ' ' . $user->getLastname();?>
                                        <!--<input type="checkbox" name="reservations[]" value="<?php //echo $reservation->getId(); ?>"><?php //echo $reservationName; ?>-->
                                        <option  value="<?php echo $user->getId(); ?>"><?php echo $userName; ?></option>
                                <?php endforeach; ?>
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
                                <?php echo $controller->deleteUser(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>