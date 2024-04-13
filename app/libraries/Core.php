<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    // print_r($this->getUrl());

    $url = $this->getUrl();

    // Look in controllers for this file
    if (file_exists('../app/controllers/' . ucwords($url[1] ?? '') . '.php')) {
      // If exists, set as controller
      $this->currentController = ucwords($url[1]);
      // Unset 0 Index
      unset($url[0]);
    }

    // Require the controller
    require_once '../app/controllers/' . $this->currentController . '.php';

    // Instantiate controller class
    $this->currentController = new $this->currentController;

    // Check for second part of url
    if (isset($url[1])) {
      // Check to see if method exists in controller
      $methodWithoutQuery = $url[2];
      $queryPosition = strpos($methodWithoutQuery, '?');
      if ($queryPosition !== false) {
        // Extract parameter value from the segment containing the query string
        $paramSegment = substr($methodWithoutQuery, $queryPosition + 1);
        // Split the parameter segment by '=' to get the parameter name and value
        $paramParts = explode('=', $paramSegment, 2);
        // Set the current method to the method name without the query string
        $this->currentMethod = substr($methodWithoutQuery, 0, $queryPosition);
        // Set the params array with the parameter value
        $this->params = [$paramParts[1] ?? ''];
      } else {
        if (method_exists($this->currentController, $methodWithoutQuery)) {
          $this->currentMethod = $methodWithoutQuery;
        }
        // Unset 1 index  
        unset($url[1]);
      }

    }

    // Get params
    // $this->params = $url ? array_values($url) : [];

    // Call a callback with array of params
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }


  // Get url
  public function getUrl()
  {
    if (isset($_SERVER['REQUEST_URI'])) {
      $url = rtrim($_SERVER['REQUEST_URI'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}