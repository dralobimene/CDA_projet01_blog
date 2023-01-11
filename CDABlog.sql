-- Adminer 4.8.1 MySQL 10.5.18-MariaDB-0+deb11u1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tableAdm`;
CREATE TABLE `tableAdm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tableAdm` (`id`, `name`, `email`) VALUES
(1,	'laurent',	'laurent@mail.fr');

DROP TABLE IF EXISTS `tableArticle`;
CREATE TABLE `tableArticle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `publishedAt` datetime NOT NULL,
  `isPublished` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tableArticle` (`id`, `title`, `content`, `createdAt`, `publishedAt`, `isPublished`) VALUES
(1,	'How to Build a Basic Website',	'Learn the steps for building a simple website using HTML and CSS.',	'2022-01-01 12:00:00',	'2022-01-03 12:00:00',	1),
(2,	'The Benefits of Meditation',	'Discover the mental and physical benefits of a regular meditation practice.',	'2022-01-02 12:00:00',	'2022-01-05 12:00:00',	1),
(3,	'The History of Chocolate',	'Explore the fascinating history of chocolate, from its origins in ancient Mesoamerica to its modern-day popularity.',	'2022-01-03 12:00:00',	'2022-01-07 12:00:00',	1),
(4,	'Understanding Quantum Mechanics',	'Learn about the fundamental principles of quantum mechanics and how they revolutionized our understanding of the universe.',	'2022-01-04 12:00:00',	'2022-01-09 12:00:00',	1),
(5,	'10 Delicious Vegan Recipes',	'Try out these tasty vegan recipes for a healthier, more sustainable lifestyle.',	'2022-01-05 12:00:00',	'2022-01-11 12:00:00',	1),
(6,	'titre article 01',	'contenu article 01',	'2023-01-01 12:00:00',	'2023-01-01 13:00:00',	1),
(7,	'titre article 02',	'contenu article 02',	'2023-01-01 12:00:00',	'2023-01-01 13:00:00',	1);

DROP TABLE IF EXISTS `tableComentary`;
CREATE TABLE `tableComentary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tableComentary` (`id`, `content`, `createdAt`) VALUES
(1,	'This is a great article! I learned a lot about building websites.',	'2022-01-02 14:00:00'),
(2,	'Meditation has really improved my mental clarity and focus.',	'2022-01-03 15:00:00'),
(3,	'I never knew chocolate had such a rich history. Fascinating!',	'2022-01-04 16:00:00'),
(4,	'Quantum mechanics is such a mind-bending subject. Im still trying to wrap my head around it.',	'2022-01-05 17:00:00'),
(5,	'These vegan recipes look delicious! I cant wait to try them out.',	'2022-01-06 18:00:00'),
(6,	'com 01',	'2023-01-01 12:00:00');

DROP TABLE IF EXISTS `tableRelationAdmArticle`;
CREATE TABLE `tableRelationAdmArticle` (
  `tableAdmId` int(11) NOT NULL,
  `tableArticleId` int(11) NOT NULL,
  PRIMARY KEY (`tableAdmId`,`tableArticleId`),
  KEY `tableArticleId` (`tableArticleId`),
  CONSTRAINT `tableRelationAdmArticle_ibfk_3` FOREIGN KEY (`tableAdmId`) REFERENCES `tableAdm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tableRelationAdmArticle_ibfk_4` FOREIGN KEY (`tableArticleId`) REFERENCES `tableArticle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tableRelationAdmArticle` (`tableAdmId`, `tableArticleId`) VALUES
(1,	1),
(1,	2),
(1,	3),
(2,	1),
(2,	2),
(3,	2);

DROP TABLE IF EXISTS `tableRelationUserComentary`;
CREATE TABLE `tableRelationUserComentary` (
  `tableUserId` int(11) NOT NULL,
  `tableComentaryId` int(11) NOT NULL,
  PRIMARY KEY (`tableUserId`,`tableComentaryId`),
  KEY `tableComentaryId` (`tableComentaryId`),
  CONSTRAINT `tableRelationUserComentary_ibfk_3` FOREIGN KEY (`tableUserId`) REFERENCES `tableUser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tableRelationUserComentary_ibfk_4` FOREIGN KEY (`tableComentaryId`) REFERENCES `tableComentary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tableRelationUserComentary` (`tableUserId`, `tableComentaryId`) VALUES
(1,	1),
(1,	2),
(2,	1),
(2,	2),
(3,	2);

DROP TABLE IF EXISTS `tableUser`;
CREATE TABLE `tableUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tableUser` (`id`, `name`, `email`) VALUES
(1,	'John Smith',	'john.smith@example.com'),
(2,	'Jane Doe',	'jane.doe@example.com'),
(3,	'Bob Johnson',	'bob.johnson@example.com'),
(4,	'Alice Williams',	'alice.williams@example.com'),
(5,	'Mike Brown',	'mike.brown@example.com'),
(6,	'Sara Davis',	'sara.davis@example.com'),
(7,	'Tom Johnson',	'tom.johnson@example.com'),
(8,	'Emily Smith',	'emily.smith@example.com'),
(9,	'Andrew Williams',	'andrew.williams@example.com'),
(10,	'Katie Davis',	'katie.davis@example.com');

-- 2023-01-11 10:59:01
