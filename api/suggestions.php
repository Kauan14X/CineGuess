<?php

include "../data/movies.php";

$query = strtolower($_GET['q']);

$suggestions = [];

foreach ($movies as $movie){
    if(strpos(strtolower($movie['title']), $query) !== false){

        $suggestions[] = $movie['title'];
    }
}

echo json_encode(array_slice($suggestions,0,5));