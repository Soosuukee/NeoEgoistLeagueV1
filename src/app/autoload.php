<?php
// Autoload classes from entities and managers directories
spl_autoload_register(function ($class) {
    $directories = ['entities/', 'managers/'];

    foreach ($directories as $dir) {
        $file = __DIR__ . '/' . $dir . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            break;
        }
    }
});
