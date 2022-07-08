<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-06-30 19:28:06
 * @modify date 2022-06-30 19:52:05
 * @license GPLv3
 * @desc [description]
 */

namespace Jinome\Supports;

class Rest
{
    private static $directory = '';

    public static function setDirectory(string $directoryPath)
    {
        self::$directory = $directoryPath . DS;
    }
    
    public static function handle(string $restName)
    {
        $dbs = \SLiMS\DB::getInstance('mysqli');
        $fileAttribute = pathinfo($restName);
        if (file_exists($path = self::$directory . basename($fileAttribute['filename']) . '.php'))
        {
            include_once $path;   
        }
    }    
}