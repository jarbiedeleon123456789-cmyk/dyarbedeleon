<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS  (Part D)
| -------------------------------------------------------------------
| Points the LavaLust app at the "mydb" database created in Part A.
| Update 'username' / 'password' to match your local MySQL setup
| (Laragon default is usually username 'root' with an empty password).
*/

$database['main'] = array(
    'driver'    => 'mysql',
    'hostname'  => getenv('DB_HOST') ?: 'localhost',
    'port'      => getenv('DB_PORT') ?: '3306',
    'username'  => getenv('DB_USERNAME') ?: 'root',
    'password'  => getenv('DB_PASSWORD') ?: '',
    'database'  => getenv('DB_DATABASE') ?: (getenv('DB_NAME') ?: 'mydb'),
    'charset'   => 'utf8mb4',
    'dbprefix'  => '',
    // Optional for SQLite
    'path'      => ''
);

?>
