<?php

// Utilizza DOMDocument()

error_reporting(E_ALL);

ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '5000');
ini_set('xdebug.var_display_max_data', '5000');

$url = "https://free-proxy-list.net";
// $url = "http://www.freeproxylists.net/"; // sito 2 (USARE CURL)
// $url = "http://info.cern.ch/hypertext/WWW/TheProject.html";


$ch = curl_init();

curl_setopt($ch,CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$content = curl_exec($ch);

$dom = new DOMDocument();
@$dom->loadHTML($content); // @ => warning suppressor
// var_dump($doc->childNodes);

// prova: prelevo il titolo
$title = $dom->getElementsByTagName('title');
var_dump($title[0]->textContent);

// prelevo i dati dalla tabella proxy (ricerca elemento per id)
$table = $dom->getElementById('proxylisttable');

var_dump($table->childNodes[1]); //tbody

foreach ($table->childNodes as $elem) {
    // var_dump($elem->nodeValue);
    var_dump($elem->childNodes);

    // foreach ($elem->childNodes as $item) {
    //     var_dump($item[0]);
    // }
}



// $content = file_get_contents($url,0);

// $dom = new DOMDocument();
// $dom->loadHTML($content);

// $dom = DOMDocument::loadHTML($content);

// var_dump($dom->childNodes);

// $pageDom = new DomDocument();   
// $searchPage = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
// @$pageDom->loadHTML($searchPage);

// var_dump($pageDom->childNodes);

// foreach ($doc->childNodes as $key => $value) {
//     // var_dump($key);
//     var_dump($value);
// }