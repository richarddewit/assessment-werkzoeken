<?php

function connectToDatabase(): PDO
{
    return new PDO('mysql:dbname=db;host=db', 'db', 'db');
}

function getVacancies($db, $search = null, $location = null): array
{
    $sql = 'SELECT * FROM vacancies';
    $params = [];

    if ($search) {
        $sql .= ' WHERE title LIKE :search';
        $params['search'] = "%$search%";
    }
    if ($location) {
        if ($search) {
            $sql .= ' AND';
        } else {
            $sql .= ' WHERE';
        }
        $sql .= ' location = :location';
        $params['location'] = $location;
    }

    $sql .= ' ORDER BY created_at DESC';

    $statement = $db->prepare($sql);
    $statement->execute($params);

    return $statement->fetchAll();
}

function getVacancy($db, $id): array|bool
{
    $sql = 'SELECT * FROM vacancies WHERE id = :id';
    $statement = $db->prepare($sql);
    $statement->execute(['id' => $id]);

    return $statement->fetch();
}

function createVacancy($db, $title, $company, $location, $body)
{

}
