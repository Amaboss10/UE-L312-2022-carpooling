<?php

use App\Controllers\PostsController;
use App\Services\PostsService;

require __DIR__ . '/vendor/autoload.php';

$controller = new PostsController();
echo $controller->createPost();

?>

<p>Création d'une annonce</p>
<form method="post" action="posts_create.php" name ="annonceCreateForm">
    <label for="title">Titre :</label>
    <input type="text" name="title">
    <br />
    <label for="dates">Date prévue au format dd-mm-yyyy :</label>
    <input type="text" name="dates">
    <br />
    <label for="ride">Trajet : </label>
    <input type="text" name="ride">
    <br />
    <label for="nbrPlacesDisp"> Nombres de places disponibles : </label>
    <input type="text" name="nbrPlacesDisp">
    <br />
    <label for="description">Description :</label>
    
        <input type="text" name="description">
        <br />
    <br />
    <input type="submit" value="Ajouter l'annonce">
</form>