<?php
use App\Controllers\PostsController;
use App\Services\PostsService;
use App\Services\CarsService;
use App\Services\ReservationsService;

require __DIR__ . '/vendor/autoload.php';
include_once 'index/header.php';
$controller = new PostsController();
$PostsService = new PostsService();
$posts = $PostsService->getPost();
$carsService = new CarsService();
$cars = $carsService->getCars();
$reservationsService = new ReservationsService;
$reservations = $reservationsService->getReservations();
echo $controller->getPost();
?>
<br>
<table  class="form">
    <tr>
        <td>
            <form method="post" action="posts_crud.php" name ="postCreateForm">
                <table class="form-control">
                    <tr>
                        <td>
                            <h1>Création d'une annonce</h>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="id">Identifiant :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="id">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="description">Description :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="description">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="price">prix :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="price">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="date">Date de départ :</label>
                        </td>
                        <td>
                        <input type="date" class="form-control" name="date"
                        value="2022-11-25"
                        min="2018-01-01" max="2024-12-31">                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="number_of_passangers">nombre de passagers:</label>
                        </td>
                        <td>
                        <input type="text" class="form-control" name="number_of_passangers">
                       </td>
                    </tr>


                    <tr>
                        <td>
                            <br><input type="submit" class="button" value="Créer">
                        </td>
                    </tr> 
                    
                    <tr>
                        <td>
                            <?php echo $controller->createPosts(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>

        <td>
            <form method="post" action="posts_crud.php" name ="postUpdateForm">
                <table class="form-control" >
                    <tr>
                        <td>
                            <h1>Mise à jour d'une annonce</h1>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label for="id">annonce :</label>
                        </td>
                        <td>
                        <select name="idup" class="form-control">
                                <option value="" selected disabled>Choisir une annonce</option>
                                <?php foreach ($posts as $post): ?>
                                        <?php $postName ='#'. $post->getId(). ' | ' . $post->getPrice() . '€ ' . $post->getdescription().'➔'. $post->getDestination(); ?>
                                        <!--<input type="checkbox" name="reservations[]" value="<?php //echo $reservation->getId(); ?>"><?php //echo $reservationName; ?>-->
                                        <option  value="<?php echo $post->getId(); ?>"><?php echo $postName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="id">Identifiant :</label>  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="id">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="description">Description :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="description">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="price">prix :</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="price">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="date">Date de départ :</label>
                        </td>
                        <td>
                        <input type="date" class="form-control" name="date"
                        value="2022-11-25"
                        min="2018-01-01" max="2024-12-31">                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="number_of_passangers">nombre de passagers:</label>
                        </td>
                        <td>
                        <input type="text" class="form-control" name="number_of_passangers">
                       </td>
                    </tr>
                    <tr>
                        <td>
                            <br><input type="submit" class="button" value="Mise à jour">
                        </td>
                    </tr>

                    <tr>
                        <td>
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
                        <td>
                            <h1>Supression d'une annonce</h1>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label for="id">annonce :</label>
                        </td>

                        <td>
                            <select name="iddel" class="form-control">
                                <option value="" selected disabled>Choisir une annonce</option>
                                <?php foreach ($posts as $post): ?>
                                        <?php $postName ='#'. $post->getId(). ' | ' . $post->getPrice() . '€ ' . $post->getdescription().'➔'. $post->getDestination(); ?>
                                        <option  value="<?php echo $post->getId(); ?>"><?php echo $postName; ?></option>
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
                            <?php echo $controller->deletePosts(); ?>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>