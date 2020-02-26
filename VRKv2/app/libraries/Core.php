<?php

/*
  * App Core Class
  * Create URL and loads core controller
  * URL FORMAT - /Controller/method/params

  * Mapping URL to the controller
*/


class Core {
  # Will change as URL changes
  protected $currentController = "pages";
  protected $currentMethod = "index";
  protected $params = [];

  public function __construct() {
    $url = $this->getUrl();

    # Look in controllers for first value
    if (file_exists("../app/controllers/" . ucwords($url[0]) . ".php")) {
      # If exists then set as controller
      $this->currentController = ucwords($url[0]);
      # Unset 0 index
      unset($url[0]);
    }

    # Require the controller
    require_once "../app/controllers/" . $this->currentController . ".php";

    # Instantiate controller class
    $this->currentController = new $this->currentController;

    # Check for second part of url
    if (isset($url[1])) {
      # Check to see if method exists in controller
      if(method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        # Unset 1 index
        unset($url[1]);
      }
    }

    # Get params
    $this->params = $url ? array_values($url) : [];

    # Call a callback with array of params
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  public function getUrl() {
    if (isset($_GET["url"])) {
      $url = rtrim($_GET["url"], "/");
      # Shouldn't have any characters that url shouldn't have
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode("/", $url);
      return $url;
    }
  }
}