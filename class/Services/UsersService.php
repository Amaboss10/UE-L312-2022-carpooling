<?php declare(strict_types = 1);

namespace App\Services;

use App\Entities\Car;
use App\Entities\Post;
use App\Entities\Reservation;
use App\Entities\User;

class UsersService
{
    /**
     * Create or update an user.
     */
    public function setUser(?string $id, string $firstname, string $lastname, string $email, string $birthday): string
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $birthdayDateTime = new \DateTime($birthday);
        if (empty($id)) {
            $isOk = $dataBaseService->createUser($firstname, $lastname, $email, $birthdayDateTime);
        } else {
            $isOk = $dataBaseService->updateUser($id, $firstname, $lastname, $email, $birthdayDateTime);
        }

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $dataBaseService = new DataBaseService();
        $usersDTO = $dataBaseService->getUsers();
        if (!empty($usersDTO)) {
            foreach ($usersDTO as $userDTO) {
                $user = new User();
                $user->setId($userDTO['id']);
                $user->setFirstname($userDTO['firstname']);
                $user->setLastname($userDTO['lastname']);
                $user->setEmail($userDTO['email']);
                $date = new \DateTime($userDTO['birthday']);
                if ($date !== false) {
                    $user->setbirthday($date);
                }
                $users[] = $user;
            }
        }

        return $users;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();

        return $dataBaseService->deleteUser($id);
    }

    /**
     * Create relation bewteen an user and his car.
     */
    public function setUserCar(string $userId, string $carId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();

        return $dataBaseService->setUserCar($userId, $carId);
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $usersCarsDTO = $dataBaseService->getUserCars($userId);
        if (!empty($usersCarsDTO)) {
            foreach ($usersCarsDTO as $userCarDTO) {
                $car = new Car();
                $car->setId($userCarDTO['id']);
                $car->setBrand($userCarDTO['brand']);
                $car->setModel($userCarDTO['model']);
                $car->setColor($userCarDTO['color']);
                $car->setNbrSlots($userCarDTO['nbrSlots']);
                $userCars[] = $car;
            }
        }

        return $userCars;
    }

    public function setUserPost(string $userId, string $postId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();

        return $dataBaseService->setUserPost($userId, $postId);
    }

    public function setUserReservation(string $userId, string $reservationId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();

        return $dataBaseService->setUserReservation($userId, $reservationId);
    }

    public function getUserPost(string $user_id): array
    {
        $userPost = [];

        $dataBaseService = new DataBaseService();

        // get the relation user and post
        $usersPostsDTO = $dataBaseService->getUserPost($user_id);
        if (!empty($usersPostsDTO)) {
            foreach ($usersPostsDTO as $userpostDTO) {
                $post = new Post();
                $post->setId($userpostDTO['id']);
                $post->setDescription($userpostDTO['description']);
                $post->setPrice($userpostDTO['price']);
                $post->setDate($userpostDTO['date']);
                $post->setNumber_of_passengers($userpostDTO['number_of_passengers']);

                $userPost[] = $post;
            }
        }

        return $userPost;
    }

    public function getUserReservations(string $user_id): array
    {
        $usersReservations = [];

        $dataBaseService = new DataBaseService();

        // get the relation user and reservation
        $usersReservationsDTO = $dataBaseService->getUserReservations($user_id);
        if (!empty($userReservationsDTO)) {
            foreach ($usersReservationsDTO as $userReservationDTO) {
                $reservation = new Reservation();
                $reservation->getId($userReservationDTO['id']);
                $reservation->getDate($userReservationDTO['date']);
                $reservation->getDeparture_time($userReservationDTO['departure_time']);
                $reservation->getArriving_time($userReservationDTO['arriving_time']);
                $reservation->getPlace_of_departure($userReservationDTO['place_of_departure']);
                $reservation->getArrival_point($userReservationDTO['arrival_point']);

                $usersReservations[] = $reservation;
            }
        }

        return $usersReservations;
    }
}
