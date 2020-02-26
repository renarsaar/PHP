<?php

/*
 * Load form on register page
 * Submit the register form when make post request  
 */


  class Users extends Controller {
    public function __construct() {
      # Check models folder = file user.php
      $this->userModel = $this->model("User");
    }

    #--------------REGISTER--------------
    public function register() {
      # Check for POST
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        # Process the form
        # Sanitize Post data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          "name" => trim($_POST["name"]),
          "email" => trim($_POST["email"]),
          "password" => trim($_POST["password"]),
          "confirm_password" => trim($_POST["confirm_password"]),
          "name_err" => "",
          "email_err" => "",
          "password_err" => "",
          "confirm_password_err" => ""
        ];

        # Validate Email
        if (empty($data["email"])) {
          $data["email_err"] = "Please enter email";
        } else {
          # Check email
          if($this->userModel->findUserByEmail($data["email"])) {
            $data["email_err"] = "This Email is taken";
          }
        }

        # Validate Name
        if (empty($data["name"])) {
          $data["name_err"] = "Please enter name";
        }

         # Validate Password
         if (empty($data["password"])) {
          $data["password_err"] = "Please enter password";
        } else if (strlen($data["password"]) < 6) {
          $data["password_err"] = "Password must be atleast 6 characters";
        }

        # Validate Confirm Password
        if (empty($data["confirm_password"])) {
          $data["confirm_password_err"] = "Please confirm password";
        } else {
            if ($data["password"] != $data["confirm_password"]) {
              $data["confirm_password_err"] = "Passwords do not match";
            }
        }

        # Make sure errors are empty
        if (empty($data["email_err"]) && empty($data["name_err"]) && empty($data["password_err"]) && empty($data["confirm_password_err"])) {
          # Validated
          
          # HASH PASSWORD
          $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);

          # Register User
         if ($this->userModel->register($data)) {
          flash("register_success", "You are registered and can log in");
          redirect("users/login");
         } else {
           die ("Something went wrong");
         }
        } else {
          # Load view with errors
          $this->view("/users/register", $data);
        }



      } else {
        # Load the form
        # Init data if not post request
        # FOR NOT TO FILL OVER AGAIN
        $data = [
          "name" => "",
          "email" => "",
          "password" => "",
          "confirm_password" => "",
          "name_err" => "",
          "email_err" => "",
          "password_err" => "",
          "confirm_password_err" => ""
        ];
        
        # Load view
        $this->view("users/register", $data);
      }
    }


    # --------------LOGIN--------------
    public function login() {
      # Check for POST
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        # Process the form
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          "email" => trim($_POST["email"]),
          "password" => trim($_POST["password"]),
          "email_err" => "",
          "password_err" => "",
        ];

        # Validate Email
        if (empty($data["email"])) {
          $data["email_err"] = "Please enter email";
        } 

        # Validate Password
        if (empty($data["password"])) {
          $data["password_err"] = "Please enter password";
        }

        # Check for user/email
        if ($this->userModel->findUserByEmail($data["email"])) {
          # User found

        } else {
          # Not found
          $data["email_err"] = "No user found with this Email";
        }

        # Make sure errors are empty
        if (empty($data["email_err"]) && empty($data["password_err"])) {
          # Validated
          # Check and set logged in user
          $loggedInUser = $this->userModel->login($data["email"], $data["password"]);

          if ($loggedInUser) {
            # Create session variables
            die("SUCCESSS");
          } else {
            $data["password_err"] = "Password incorrect";

            $this->view("users/login", $data);
          }
        } else {
          # Load view with errors
          $this->view("/users/login", $data);
        }



      } else {
        # Load the form
        # Init data if not post request
        # FOR NOT TO FILL OVER AGAIN
        $data = [
          "email" => "",
          "password" => "",
          "email_err" => "",
          "password_err" => ""
        ];
        
        # Load view
        $this->view("users/login", $data);
      }
    }
  }