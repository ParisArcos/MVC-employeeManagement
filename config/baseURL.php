<?php
$baseUri = explode('/', substr($_SERVER['PHP_SELF'], 1));
$url = "";
for ($i = 0; $i < count($baseUri) - 1; $i++) {
    $url .= $baseUri[$i] . '/';
}
$url = "http://$_SERVER[HTTP_HOST]/" . $url;

define("BASE_URL", $url);
