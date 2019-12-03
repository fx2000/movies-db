<?php

class Movie {

  // Database connection
  private $conn;
  private $table_name = 'movies';

  // Properties
  public $title;
  public $year;

  public function _construct($db) {
    $this-conn = $db;
  }

  // Add a new movie
  function add() {

    // Check if movie already exists
    if ($this->alreadyExists()) {
      return false;
    }

    // Create database query
    $query =
      "INSERT INTO " . $this->table_name . "(`title`, `year`) VALUES ('" . $this->title . "', '" . $this->year . "')";
    
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }
    return false;

  }

  // Delete an existing movie
  function remove() {

    // Create database query
    $query =
      "DELETE FROM " . $this->table_name . " WHERE title='" . $this->title . "'";
    
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  // Check if movie already exists
  function alreadyExists() {

    // Create database query
    $query =
      "SELECT * FROM " . $this->table_name . " WHERE title='" . $this->title . "'";
    
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    // Check if database returned any rows
    if ($stmt->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
