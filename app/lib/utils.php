<?php


/**
 * Genereert een relative tijdstring op basis van de gegeven datum, bijvol: 2 dagen geleden
 *
 * @param string $datetime
 * @param bool $full
 * @return string
 * @throws DateMalformedStringException
 */
function time_elapsed_string(string $datetime, bool $full = false): string
{
    $now = new DateTime();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $string = array(
        'y' => ['jaar', 'jaar'],
        'm' => ['maand', 'maanden'],
        'd' => ['dag', 'dagen'],
        'h' => ['uur', 'uur'],
        'i' => ['minuut', 'minuten'],
        's' => ['seconde', 'seconden'],
    );
    foreach ($string as $short => &$name) {
        if ($diff->$short) {
            $name = $diff->$short . ' ' . ($diff->$short > 1 ? $name[1] : $name[0]);
        } else {
            unset($string[$short]);
        }
    }

    if (!$full) {
        $string = array_slice($string, 0, 1);
    }
    return $string ? implode(', ', $string) . ' geleden' : 'zojuist';
}

/**
 * @param string $message
 * @return void
 */
function raiseNotFound(string $message = 'Pagina bestaat niet'): void
{
    http_response_code(404);
    require_once(__DIR__ . '/../include/404.php');
    exit();
}

/**
 * @param string $message
 * @return void
 */
function raiseBadRequestJson(string $message): void
{
    http_response_code(400);
    header('Content-Type: application/json');
    die(json_encode(['ok' => false, 'message' => $message]));
}

/**
 * @return void
 */
function successRequestJson(): void
{
    http_response_code(200);
    header('Content-Type: application/json');
    die(json_encode(['ok' => true]));
}

/**
 * @param int $currentPage
 * @param int $page
 * @return string
 */
function formatPageLink(int $currentPage, int $page): string
{
    $link = $_SERVER['QUERY_STRING'];
    $link = str_replace('page=' . $currentPage, '', $link);
    $link = trim($link, '&');
    return '?page=' . $page . ($link ? '&' . $link : '');
}
