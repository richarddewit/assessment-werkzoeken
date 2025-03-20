DROP TABLE IF EXISTS `vacancies`;
CREATE TABLE `vacancies`
(
    `id`   int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` varchar(255) DEFAULT NULL,
    `company` varchar(255) DEFAULT NULL,
    `location` varchar(255) DEFAULT NULL,
    `body` text,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `vacancies` WRITE;
INSERT INTO `vacancies`
VALUES ('1', 'Software Engineer', 'Geegle', 'Eindhoven', 'We are looking for a Software Engineer to join our team.', '2024-12-30 00:00:00'),
       ('2', 'PHP Developer', 'Werkzoeken.nl', 'Amersfoort', 'Kom ons team versterken! Wij zoeken mensen.', '2025-01-01 00:00:00');
UNLOCK TABLES;

