<?php

include_once '../config/database.php';
include_once '../objects/movie.php';

$database = new Database();
$db = $database->getConnection();

$movie = new Movie($db);

$movie->title = $_POST['title'];
$movie->year = $_POST['year'];

if ($movie->add()) {
  $movieArr = array(
    'status' => true,
    'title' => $movie->title,
    'year' => $movie->year
  );
} else {
  $movieArr = array(
    'status' => false,
    'message' => 'Movie already exists'
  );
}

print_r(json_encode($movieArr));
