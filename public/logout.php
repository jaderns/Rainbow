<?php

use App\SessionManager;

require_once __DIR__.'/../src/SessionManager.php';

SessionManager::logout();
header('location: index.php');
