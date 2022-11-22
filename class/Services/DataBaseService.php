<?php declare(strict_types = 1);

namespace App\Services;

class DataBaseService
{
    public const HOST = '127.0.0.1';
    public const PORT = '3306';
    public const DATABASE_NAME = 'carpooling';
    public const MYSQL_USER = 'root';
    public const MYSQL_PASSWORD = 'password';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new \PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec('SET CHARACTER SET utf8');
        } catch (\Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, \DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(\DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, \DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(\DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    /**
     * Create a car.
     */
    public function createCar(string $numberplate, string $brand, string $model, string $type, string $color, int $year): bool
    {
        $isOk = false;

        $data = [
            'numberplate' => $numberplate,
            'brand' => $brand,
            'model' => $model,
            'type' => $type,
            'color' => $color,
            'year' => $year,
        ];
        $sql = 'INSERT INTO cars (numberplate, brand, model, type, color, year) VALUES (:numberplate, :brand, :model, :type, :color, :year)';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    // Return all cars
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT *FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    // Update a car
    public function updateCar(string $id, string $numberplate, string $brand, string $model, string $type, string $color, int $year): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'numberplate' => $numberplate,
            'brand' => $brand,
            'model' => $model,
            'type' => $type,
            'color' => $color,
            'year' => $year,
        ];
        $sql = 'UPDATE cars SET numberplate = :numberplate, brand = :brand, model = :model, type = :type, color = :color, year = :year WHERE id = :id;';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    public function deleteCar(string $id): bool
    {
        $isOk = false;
        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM cars WHERE id = :id;';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    /**
     * Create a post.
     */
    public function createPost(string $description, int $price, \DateTime $date, $number_of_passengers): bool
    {
        $isOk = false;

        $data = [
            'description' => $description,
            'price' => $price,
            'date' => $date,
            'number_of_passengers' => $number_of_passengers,
        ];
        $sql = 'INSERT INTO post (description, price, date, number_of_passengers) VALUES (:description, :price, : date, :number_of_passengers)';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    // Return all posts.
    public function getPosts(): array
    {
        $posts = [];

        $sql = 'SELECT * FROM posts';
        $query = $this->connection->prepare($sql);
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $posts = $results;
        }

        return $posts;
    }

    // Update an post
    public function updatePost(string $id, string $description, int $price, \DateTime $date, $number_of_passengers): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'description' => $description,
            'price' => $price,
            'date' => $date,
            'number_of_passengers' => $number_of_passengers,
        ];
        $sql = 'UPDATE post SET description = :description, price = :price, date = :date, number_of_passenger = :number_of_passengers WHERE id = :id;)';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    // Delete a Post
    public function deletePost(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM post WHERE id = :id;';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    // Create a reservation
    public function createReservation(\DateTime $date, string $departure_time, string $arriving_time, string $place_of_departure, string $arrival_point): bool
    {
        $isOk = false;

        $data = [
            'date' => $date->format(\DateTime::RFC3339),
            'departure_time' => $departure_time,
            'arriving_time' => $arriving_time,
            'place_of_departure' => $place_of_departure,
            'arrival_point' => $arrival_point,
        ];
        $sql = 'INSERT INTO reservations (date, departure_time, arriving_time, place_of_departure, arrival_point) VALUES (:date, :departure_time, :arriving_time, :place_of_departure, :arrival_point)';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    // Return all posts
    public function getReservations(): array
    {
        $reservations = [];

        $sql = 'SELECT * FROM reservations';
        $query = $this->connection->prepare($sql);
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $reservations = $results;
        }

        return $reservations;
    }

    // update an reservation
    public function updateReservation(string $id, \DateTime $date, string $departure_time, string $arriving_time, string $place_of_departure, string $arrival_point): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'date' => $date->format(\DateTime::RFC3339),
            'departure_time' => $departure_time,
            'arriving_time' => $arriving_time,
            'place_of_departure' => $place_of_departure,
            'arrival_point' => $arrival_point,
        ];
        $sql = 'UPDATE reservations SET date = :date, departure_time = :departure_time, arriving_time = :arriving_time, place_of_departure = :place_of_departure, arrival_point = :arrival_point WHERE id = :id';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    // delete a reservation
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM reservations WHERE id = :id;';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }
}
