<?php

if (function_exists("acf_add_local_field_group")) {
    $folder = __DIR__ . '/acf/';
    $files = scandir($folder);

    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'php')
            include $folder . $file;
    }
}
