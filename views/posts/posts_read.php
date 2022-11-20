<?php declare(strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

$controller = new PostController();
echo $controller->getPost();
