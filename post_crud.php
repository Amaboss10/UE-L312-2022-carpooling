<?php
use App\Controllers\PostsController;
use App\Services\PostsService;
use App\Services\CarsService;
use App\Services\ReservationsService;

require __DIR__ . '/vendor/autoload.php';
include_once 'index/header.php';
$controller = new PostsController();
$PostsService = new PostsService();
$Posts = $PostsService->getPost();
$carsService = new CarsService();
$cars = $carsService->getCars();
$reservationsService = new ReservationsService;
$reservations = $reservationsService->getReservations();
echo $controller->getPosts();
?>
<br>
<table  class="form">
    <tr>
        <td>
            <form method="post" action="posts_crud.php" name ="postCreateForm">
                <table class="form-control">
                    <tr>
                        <td colsppost="2">
                            <h1>Création d'une postnonce</h>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="price">Prix :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="price">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="departure">Départ :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="departure">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="destination">Arrivée :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="destination">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="date">Date de départ :</label>
                        </td>
                        <td>
                            <input type="text" name="datea" class="form-control" placeholder="format dd-mm-yyyy :">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="cars">Voiture :</label>
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
                        <td style="text-align:center" colsppost="2">
                            <br><input type="submit" class="button" value="Créer">
                        </td>
                    </tr> 
                    
                    <tr>
                        <td colsppost="2">
                            <?php echo $controller->createPost(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>

        <td>
            <form method="post" action="posts_crud.php" name ="postUpdateForm">
                <table class="form-control" >
                    <tr>
                        <td colsppost='2'>
                            <h1>Mise à jour d'une postnonce</h1>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label for="id">postnonce :</label>
                        </td>
                        <td>
                        <select name="idup" class="form-control">
                                <option value="" selected disabled>Choisir une postnonce</option>
                                <?php foreach ($Posts as $post): ?>
                                        <?php $postName ='#'. $post->getId(). ' | ' . $post->getPrice() . '€ ' . $post->getDeparture().'➔'. $post->getDestination(); ?>
                                        <!--<input type="checkbox" name="reservations[]" value="<?php //echo $reservation->getId(); ?>"><?php //echo $reservationName; ?>-->
                                        <option  value="<?php echo $post->getId(); ?>"><?php echo $postName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="name">Prix :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="priceup">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="departure">Départ :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="departureup">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="destination">Arrivée :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="destinationup">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="date">Date :</label>
                        </td>
                        <td>
                            <input type="text" name="dateup" class="form-control" placeholder="format dd-mm-yyyy :">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="reservation">Réservation :</label>
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
                        <td style="text-align:center" colsppost="2">
                            <br><input type="submit" class="button" value="Mise à jour">
                        </td>
                    </tr>

                    <tr>
                        <td colsppost="2">
                            <?php echo $controller->updatePosts(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>

        <td>
            
            <form method="post" action="posts_crud.php" name ="postDeleteForm">
                <table class="form-control">
                    <tr>
                        <td colsppost="2">
                            <h1>Supression d'une postnonce</h1>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label for="id">postnonce :</label>
                        </td>

                        <td>
                            <select name="iddel" class="form-control">
                                <option value="" selected disabled>Choisir une postnonce</option>
                                <?php foreach ($Posts as $post): ?>
                                        <?php $postName ='#'. $post->getId(). ' | ' . $post->getPrice() . '€ ' . $post->getDeparture().'➔'. $post->getDestination(); ?>
                                        <!--<input type="checkbox" name="reservations[]" value="<?php //echo $reservation->getId(); ?>"><?php //echo $reservationName; ?>-->
                                        <option  value="<?php echo $post->getId(); ?>"><?php echo $postName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center" colsppost="2">
                            <br>
                                <input type="submit" class="button" value="Supprimer">
                            <br>
                        </td>
                    </tr>

                    <tr>
                        <td colsppost="2">
                            <?php echo $controller->deletepost(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>