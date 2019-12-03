<?php

include_once '../config/database.php';
include_once '../objects/movie.php';

$database = new Database();
$db = $database->getConnection();

$movie = new Movie($db);

$movie->title = $_POST['title'];

if ($movie->delete()) {
  $movieArr = array(
    'status' => true,
    'message' => 'Movie deleted'
  );
} else {
  $movieArr = array(
    'status' => false,
    'message' => "Couldn't delete movie"
  );
}

print_r(json_encode($movieArr));
