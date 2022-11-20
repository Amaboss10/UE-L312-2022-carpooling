<?php declare(strict_types = 1);

use App\Controllers\PostsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new PostsController();
echo $controller->deletePost();
?>

<p>Supression d'un utilisateur</p>
<form method="post" action="posts_delete.php" name ="annonceDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer un utilisateur">
</form>