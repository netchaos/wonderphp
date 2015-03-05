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
  
}
