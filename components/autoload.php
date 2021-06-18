<?php
spl_autoload_register('loadingComponents');

function loadingComponents($classname){
    $array_path = ['/models/','/components/'];
     foreach ($array_path as  $path) {
        $path = ROOT. $path . $classname .'.php';
        if (is_file($path)) {
            include_once $path;
        }
}
}

