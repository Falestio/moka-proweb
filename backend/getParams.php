<?php
function getParams($url){
    $url_parse = parse_url($url, PHP_URL_QUERY);
    parse_str($url_parse, $results);
    return $results;
}