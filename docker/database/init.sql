DROP TABLE IF EXISTS `vacancies`;
CREATE TABLE `vacancies`
(
    `id`         int(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title`      varchar(255) NOT NULL,
    `company`    varchar(255) NOT NULL,
    `location`   varchar(255) NOT NULL,
    `contact`    varchar(255) NOT NULL,
    `body`       text NOT NULL,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

LOCK TABLES `vacancies` WRITE;
INSERT INTO `vacancies`
VALUES ('1',
        'Software Engineer',
        'Geegle',
        'Eindhoven',
        'Mork Suikerbrood',
        'We are looking for a Software Engineer to join our team.',
        '2024-10-12 00:00:00'),
       ('2',
        'PHP Developer',
        'Werkzoeken.nl',
        'Amersfoort',
        'Bram van de Bunt',
        'Kom ons team versterken! Wij zoeken mensen.',
        '2025-01-01 00:00:00');
UNLOCK TABLES;

