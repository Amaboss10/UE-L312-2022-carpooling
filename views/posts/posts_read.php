<?php

use App\Controllers\PostsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new PostController();
echo $controller->getPost();