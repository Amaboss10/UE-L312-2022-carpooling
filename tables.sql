CREATE TABLE `users` (
  `id` int AUTO_INCREMENT NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08');

CREATE TABLE `cars` (
  `id` int AUTO_INCREMENT NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `nbrSlots` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE 'posts' (
    'id' INT AUTO_INCREMENT NOT NULL,
    'description' varchar(255) NOT NULL,
    'price' INT(11) NOT NULL,
    'date' DATETIME  NOT NULL,
    'number_of_passengers' INT(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cars` (`id`, `brand`, `model`, `color`, `nbrSlots`) VALUES
(1, 'Skoda', 'Fabia', 'Noire', 5),
(2, 'Huandai', 'Getz', 'Rouge', 5),
(3, 'Mercedes', 'Classe C', 'Noire', 4),
(4, 'Renaut', 'Zoé', 'Bleu', 2);

CREATE TABLE users_cars (
	user_id INT NOT NULL, 
	car_id INT NOT NULL, 
	PRIMARY KEY(user_id, car_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_cars` (`user_id`, `car_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4);

CREATE TABLE users_posts (
    user_id INT NOT NULL, 
    post_id INT NOT NULL,
    PRIMARY KEY(user_id, post_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

INSERT INTO `users_posts` (`user_id`, `post_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4);

CREATE TABLE 'reservations' (
    'id' INT AUTO_INCREMENT NOT NULL,
    'date' DateTime NOT NULL,
    'departure_time' varchar(255) NOT NULL,
    'arriving_time' varchar(255) NOT NULL,
    'place_of_departure' varchar(255) NOT NULL,
    'arrival_point' varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE users_reservations (
    user_id INT NOT NULL,
    reservation_id INT NOT NULL,
    PRIMARY KEY(user_id, post_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8; 

INSERT INTO `users_reservations` (`user_id`, `reservation_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4);
