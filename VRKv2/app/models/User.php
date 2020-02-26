<?php

# Models singular
class User {
  private $db;

  # Init db with pdo class
  public function __construct() {
    $this->db = new Database;
  }

  # Register User
  public function register($data) { # includes everything(also hashed pw)
    $this->db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    # Bind values
    $this->db->bind(":name", $data["name"]);
    $this->db->bind(":email", $data["email"]);
    $this->db->bind(":password", $data["password"]);

    # Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function login($email, $password) {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(":email", $email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if(password_verify($password, $hashed_password)) {
      # Success login
      return $row;
    } else {
      return false;
    }
  }

  # Find user by email
  public function findUserByEmail($email) {
    # Call func query()
    $this->db->query("SELECT * FROM users WHERE email = :email");
    # Bind values
    $this->db->bind(":email", $email);

    $row = $this->db->single();

    # Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}