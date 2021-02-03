<?php

// Utilizza DOMDocument()

error_reporting(E_ALL);

ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '5000');
ini_set('xdebug.var_display_max_data', '5000');

$url = "https://free-proxy-list.net";
// $url = "http://www.freeproxylists.net/"; // sito 2 (USARE CURL)

$content = file_get_contents($url,0);