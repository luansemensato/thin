<?php

$defaults = require 'development.php';

return [

    // Core
    'debug' => false,
    'log.level' => \Slim\Log::INFO,

] + $defaults;
