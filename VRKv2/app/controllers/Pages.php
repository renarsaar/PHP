<?php

  class Pages extends Controller {
    public function __construct() {
      
    }

    # currentMethod
    public function index() {
      $data = [
        "title" => "VRKv2",
        "description" => "Social network built on MVC PHP Framework"
      ];

      $this->view("pages/index", $data);
    }

    public function about() {
      $data = [
        "title" => "About Us",
        "description" => "Share posts with other users"
      
      ];
      $this->view("pages/about", $data);
    }
}