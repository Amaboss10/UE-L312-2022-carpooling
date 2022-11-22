<?php declare(strict_types = 1);

namespace App\Services;

use App\Entities\Post;

class PostsService
{
    /**
     * Create Post /update post.
     */
    public function SetPost(?string $idPost, string $description, int $price, \DateTime $date, int $number_of_passengers)
    {
        $postId = '';
        $dataBaseService = new DataBaseService();
        $dateDateTime = new \DateTime($date);
        if (empty($idPost)) {
            $postId = $dataBaseService->createPost($description, $price, $date, $number_of_passengers);
        } else {
            $dataBaseService->updatePost($idPost, $description, $price, $date, $number_of_passengers);
            $postId = $idPost;
        }

        return $postId;
    }

    /**
     * Return Post.
     */
    public function getPost(): array
    {
        $posts = [];
        $dataBaseService = new DataBaseService();
        $postsDTO = $dataBaseService->getPost();
        if (!empty($postsDTO)) {
            foreach ($postsDTO as $postDTO) {
                $post = new Post();
                $post->setId($postDTO['idPost']);
                $post->setDescription($postDTO['description']);
                $post->setPrice($postDTO['price']);
                $post->setDate($postDTO['date']);
                $post->setNumber_of_passengers($postDTO['number_of_passengers']);
                /*$date = new \DateTime($postDTO['date']);
                if ($date !== false) {
                    $post->setBirthday($date);
                }*/
                $posts[] = $post;
            }
        }

        return $posts;
    }

        /**
         * Delete post.
         */
        public function deletePost(string $idPost): bool
        {
            $isOk = false;
            $dataBaseService = new DataBaseService();

            return $dataBaseService->deletePost($idPost);
        }
}
