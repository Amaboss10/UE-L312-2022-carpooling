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


CREATE TABLE IF NOT EXISTS `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numberplate` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255)  NOT NULL,
  `type`  varchar(255)  NOT NULL,
  `color` varchar(255) NOT NULL,
  `year` int Not NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `cars` (`id`, `numberplate`, `brand`, `model`, `type`, `color`, `year`) VALUES
(1, 'AA-123-AA', 'Skoda', 'Fabia','hybride', 'Noire', 2005),
(2, 'AA-124-BB', 'Huandai', 'Getz', 'hybride','Rouge', 2005),
(3, 'BB-123-BB','Mercedes', 'Classe C','hybride', 'Noire', 2004),
(4, 'BA-124-BB','Renaut', 'Zoé','hybride','Bleu', 2002);


CREATE TABLE `posts` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `description`varchar(255) NOT NULL,
    `price` INT(11) NOT NULL,
    `date` DATETIME  NOT NULL,
    `number_of_passengers` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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

CREATE TABLE `reservations` (
    `id`INT AUTO_INCREMENT NOT NULL,
    `date` DateTime NOT NULL,
    `departure_time` varchar(255) NOT NULL,
    `arriving_time` varchar(255) NOT NULL,
    `place_of_departure` varchar(255) NOT NULL,
    `arrival_point` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE users_reservations (
    user_id INT NOT NULL,
    reservation_id INT NOT NULL,
    PRIMARY KEY(user_id, reservation_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8; 

INSERT INTO `users_reservations` (`user_id`, `reservation_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4);

CREATE TABLE cars_posts (
    car_id INT NOT NULL,
    post_id INT NOT NULL,
    PRIMARY KEY(car_id, post_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8; 

INSERT INTO 'cars_posts' ('car_id', 'post_id') VALUES
(1, 1),
(2, 2),
(3, 3);

CREATE TABLE cars_reservations (
    car_id INT NOT NULL,
    reservation_id INT NOT NULL,
    PRIMARY KEY (car_id, reservation_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO 'cars_reservation' ('car_id', 'reservation_id') VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4);
