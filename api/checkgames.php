<?php

include "../data/movies.php";

$guess = $_POST['guess'];

$secret = $movies[0]; // filme secreto temporário

$guessMovie = null;

foreach($movies as $movie){

if($movie['title'] == $guess){
$guessMovie = $movie;
}

}

$result = [];

if($guessMovie){

$result["year"] =
$guessMovie["year"] == $secret["year"] ? "green" :
(abs($guessMovie["year"] - $secret["year"]) <= 3 ? "yellow" : "red");

$result["director"] =
$guessMovie["director"] == $secret["director"] ? "green" : "red";

$result["genre"] =
$guessMovie["genre"] == $secret["genre"] ? "green" : "red";

}

echo json_encode($result);