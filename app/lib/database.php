<?php

const TABLE_VACANCIES = 'vacancies';
const PAGE_SIZE = 25;

/**
 * @return PDO
 */
function connectToDatabase(): PDO
{
    return new PDO('mysql:dbname=db;host=db', 'db', 'db');
}

/**
 * @param PDO $db
 * @param string|null $search
 * @param string|null $location
 * @param int $page
 * @return array
 */
function getVacancies(PDO $db, ?string $search = null, ?string $location = null, int $page = 1): array
{
    $sql = 'SELECT * FROM ' . TABLE_VACANCIES;
    $params = [];
    filterVacancies($sql, $params, $search, $location);

    $sql .= ' ORDER BY created_at DESC';
    $sql .= ' LIMIT ' . ($page - 1) * PAGE_SIZE . ', ' . PAGE_SIZE;

    $statement = $db->prepare($sql);
    $statement->execute($params);

    return $statement->fetchAll();
}

/**
 * @param PDO $db
 * @param string|null $search
 * @param string|null $location
 * @return int
 */
function getVacancyCount(PDO $db, ?string $search = null, ?string $location = null): int
{
    $sql = 'SELECT COUNT(*) FROM ' . TABLE_VACANCIES;
    $params = [];
    filterVacancies($sql, $params, $search, $location);

    $statement = $db->prepare($sql);
    $statement->execute($params);

    return $statement->fetchColumn();
}

/**
 * @param string $sql
 * @param array $params
 * @param string|null $search
 * @param string|null $location
 * @return void
 */
function filterVacancies(string &$sql, array &$params, ?string $search, ?string $location): void
{
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
}

/**
 * @param PDO $db
 * @param int $id
 * @return array|bool
 */
function getVacancy(PDO $db, int $id): array|bool
{
    $sql = 'SELECT * FROM ' . TABLE_VACANCIES . ' WHERE id = :id';
    $statement = $db->prepare($sql);
    $statement->execute(['id' => $id]);

    return $statement->fetch();
}
