<?php

const LIB_DIR = __DIR__ . '/../lib';

require_once(LIB_DIR . '/utils.php');
require_once(LIB_DIR . '/database.php');

$id = $_POST['id'] ?? null;
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$motivation = $_POST['motivation'] ?? null;
$cv = $_FILES['cv'] ?? null;
// TODO: max filesize for CV
// TODO: limit filetypes

if (!$id || !$name || !$email || !$motivation || !$cv) {
    raiseBadRequestJson('Niet alle verplichte velden zijn ingevuld.');
}

if ($cv['error'] !== UPLOAD_ERR_OK) {
    raiseBadRequestJson('Er is iets mis gegaan tijdens het uploaden van je CV.');
}


// Sollicitatie proberen op te slaan in de database
$db = connectToDatabase();
try {
    applyForVacancy($db, $id, $name, $email, $motivation, $cv['tmp_name']);
} catch (DomainException $ex) {
    raiseBadRequestJson($ex->getMessage());
}

successRequestJson();
