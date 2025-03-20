<?php

# Genereert een relative tijdstring op basis van de gegeven datum, bijvol: 2 dagen geleden
function time_elapsed_string($datetime, $full = false)
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

function raiseNotFound($message = 'Pagina bestaat niet')
{
    http_response_code(404);
    require_once(__DIR__ . '/../include/404.php');
    exit();
}
