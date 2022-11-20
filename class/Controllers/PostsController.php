<?php declare(strict_types = 1);

namespace App\Controllers;

use App\Services\PostsService;

class PostsController
{
    /**
     * Return the html for the create action.
     */
    public function createPost(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])
        && isset($_POST['description'])
        && isset($_POST['price'])
        && isset($_POST['date'])
        ) {
            // Create the post
            $postsService = new PostsService();
            $isOk = $postsService->setPost(
                null,
                $_POST['id'],
                $_POST['description'],
                $_POST['price'],
                $_POST['date']
            );
            if ($isOk) {
                $html = 'l\'annonce est créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\' annonce.';
            }
        }

        return $html;
    }

    // Return the html for the read action

    public function getPosts(): string
    {
        $html = '';

        // Get all cars:
        $postService = new PostsService();
        $posts = $postService->getPosts();

        // Get html :
        foreach ($posts as $post) {
            $html .=
            '#' . $post->getId . ' ' .
            $post->getDescription() . ' ' .
            $post->getPrice() . ' ' .
            $post->getDate() . '<br />';
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
            && isset($_POST['description'])
            && isset($_POST['price'])
            && isset($_POST['date'])) {
            // update the posts :
            $postsService = new PostsServices();
            $isOk = $postsService->setPost(
                $_POST['id'],
                $_POST['description'],
                $_POST['price'],
                $_POST['date'],
            );
            if ($isOk) {
                $html = 'l\' annonce est mis à jour avec succès';
            } else {
                $html = 'erreur lors de la mis à jour de l\' annonce ';
            }
        }

        return $html;
    }

    /**
     * delete a posts.
     */
    public function deletePost(): string
    {
        $html = '';
        // if the form have been submitted :
        if (isset($_POST['id'])) {
            // delete the car
            $postsService = new PostsService();
            $isOk = $postsService->deleteCar($_POST['id']);
            if ($isOk) {
                $html = 'l\'annonce a été supprimé avec succès';
            } else {
                $html = 'Erreur lors de la suppression de l\'annonce';
            }
        }

        return $html;
    }
}
