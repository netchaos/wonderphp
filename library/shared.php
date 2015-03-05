<?php

/* Display error if environment is development */

function setReporting() {
  error_reporting(E_ALL);

  if(DEVELOPMENT_ENVIRONMENT === true) {
    init_set('display_errors', 'On');
  } else {
    init_set('display_errors', 'On');
    init_set('log_errors', 'On');
    init_set('error_log', ROOT . DS . 'temp' . 'logs' . DS .'error.log');
  }
}

/* Main Call Function*/

function callHook() {
  global $url;

  $urlArray = array();
  $urlArray = explode('/', $url);

  $controller = $urlArray[0];
  array_shift($urlArray);
  $action = $urlArray[0];
  array_shift($urlArray);
  $queryString = $urlArray;

  $controllerName = $controller;
  $controller = ucwords($controller);
  $model = rtrim($controller, 's');
  $controller .= 'Controller';

  $dispatch = new $controller($model, $controllerName, $action);

  if((init)method_exists($controller, $action)){
    call_user_func_array
  } else {
    /*Error Generation Code*/
  }
}

function __autoload($className){
  if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.php');
    } else if (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . strtolower($className) . '.php');
    } else if (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'models' . DS . strtolower($className) . '.php');
    } else {
        /* Error Generation Code Here */
    }
}

setReporting();
callHook();
