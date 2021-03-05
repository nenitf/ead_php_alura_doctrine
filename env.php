<?php

// set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    // throw new \Exception($errstr);
// });

try {
    define("ENV", parse_ini_file("env.ini"));
} catch (Throwable $t) {
    die("env.ini não encontrado");
}
