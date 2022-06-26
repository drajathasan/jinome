<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-06-08 14:33:09
 * @modify date 2022-06-26 17:46:44
 * @license GPLv3
 * @desc [description]
 */

$namespaces = [
    "Jinome\\" => __DIR__ . '/',
];

foreach ($namespaces as $namespace => $rootPath) {
    spl_autoload_register(function($class) use($namespace,$rootPath) {
        $filePath = str_replace('\\', DS, str_replace($namespace, '', $class));
        
        if (file_exists($fullPath = $rootPath . $filePath . '.php'))
        {
            include_once $fullPath;
        }
    });
}

\Jinome\Supports\Component::setDirectory(__DIR__ . DS . '..' . DS . 'components');

include_once __DIR__ . '/Helper.php';
