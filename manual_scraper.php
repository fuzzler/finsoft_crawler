<?php

error_reporting(E_ALL);

ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '5000');
ini_set('xdebug.var_display_max_data', '5000');

$url = "https://free-proxy-list.net";
// $url = "http://www.freeproxylists.net/"; // sito 2 (USARE CURL)

$content = file_get_contents($url,0);

// $content = strip_tags($content);
$content = preg_replace('#<[^>]+>#', ' ', $content);

// $content = utf8_encode($content);

$content = strstr($content, 'Last Checked');
$content = strstr($content, 'Buy', true);

// trasformo in array
$rawData = explode(' ', $content);

// filtro ulteriormente (toglie gli elementi vuoti)
$rawData = array_filter($rawData);

// reset delle chiavi
$rawData = array_values($rawData);

// pulisco l'array da elementi inutili
for ($i=0; $i < count($rawData); $i++) { 
    if($rawData[$i] === 'Last' || 
        $rawData[$i] === 'Checked' ||
        // $rawData[$i] === 'minute' ||
        // $rawData[$i] === 'minutes' ||
        // $rawData[$i] === 'second' ||
        // $rawData[$i] === 'seconds' ||
        // $rawData[$i] == 'ago' ||
        // mb_strstr($rawData[$i],'ago') !== false ||
        // mb_strpos($rawData[$i],'ago') !== false ||
        // $rawData[$i] === "\t" ||
        // $rawData[$i] === "\n" ||
        // $rawData[$i] === "\r" ||
        // strlen($rawData[$i]) === 0 ||
        // empty($rawData[$i]) ||
        $rawData[$i] === 'proxy' ||         
        $rawData[$i] === '') {
        unset($rawData[$i]); // tolgo l'elemento
    }
}

// reset delle chiavi
$rawData = array_values($rawData);

// PROBLEMA: Gli stati il cui nome è diviso in due parti (e.g. Unites States)
// creano un problema di conteggio (va risolto a monte durante la pulizia)
// Creo array associativo
// for ($i=0; $i < count($rawData); $i+=10) { 
//     echo $i."<hr>";
//     $data[] = [
//         'ip' => $rawData[$i],
//         'port' => $rawData[$i+1],
//         'code' => $rawData[$i+2],
//         'country' => $rawData[$i+3],
//         'anonimity' => $rawData[$i+4],
//         'google' => $rawData[$i+5],
//         'https' => $rawData[$i+6],
//         'last_check' => $rawData[$i+7],
//         'time_meter' => $rawData[$i+8]
//     ];
//     var_dump($data);

//     if($i == 150) die;
// }
 

var_dump($rawData);