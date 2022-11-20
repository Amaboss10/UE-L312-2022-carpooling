<?php declare(strict_types = 1);

namespace App\Services;

use App\Entities\Post;

class PostsService
{
    /**
     * Create Post /update post.
     */
    public function SetPost(?string $idPost, string $description, string $price, string $date, string $number_of_passangers)
    {
        $postId = '';
        $dataBaseService = new DataBaseService();
        $dateDateTime = new \DateTime($date);
        if (empty($postID)) {
            $postId = $dataBaseService->createPost($description, $price, $date, $number_of_passangers);
        } else {
            $dataBaseService->updatePost($idPost, $description, $price, $date, $number_of_passangers);
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
        $postsDTO = $dataBaseService->getPosts();
        if (!empty($postsDTO)) {
            foreach ($postDTO as $postDTO) {
                $Post = new post();
                $post->setidPost($postDTO['idPost']);
                $post->setdescription($postDTO['description']);
                $post->setprice($postDTO['price']);
                $post->setdate($postDTO['date']);
                $post->senumber_of_passangers($postDTO['number_of_passangers']);
                $date = new \DateTime($PostDTO['date']);
                if ($date !== false) {
                    $post->setbirthday($date);
                }
                $posts[] = $post;
            }
        }
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
