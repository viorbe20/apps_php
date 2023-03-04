<?php


function getSecondsToMinutes($seconds){
    $minutes = floor($seconds / 60);
    $seconds = $seconds % 60;
    return $minutes . ' minutos. y ' . $seconds . ' segundos';
}
function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getCurrentDate () {
    return date('d/m/Y', time());
}

function getCurrentDateString() {
    setlocale(LC_TIME, 'es_ES');
    return strftime('%A, %e de %B de %Y');
}

function getCurrentHour12() {
    return date('h:i a', time());
}

function getCurrentHour24() {
    return date('H:i', time());
}

function getGreeting() {
    $hour = date('H');

    if ($hour >= 6 && $hour < 12) {
        return "Buenos días";
    } elseif ($hour >= 12 && $hour < 20) {
        return "Buenas tardes";
    } else {
        return "Buenas noches";
    }
}

