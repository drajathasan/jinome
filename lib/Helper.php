<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-06-26 01:01:38
 * @modify date 2022-06-26 01:21:01
 * @license GPLv3
 * @desc [description]
 */

if (!function_exists('jinomeUrl'))
{
    function jinomeUrl(string $additionalUrlPath = '')
    {
        return \Jinome\Supports\Http::getBaseUrl(AWB . 'admin_template/' . jinomeDir() . '/' . $additionalUrlPath);
    }
}

 if (!function_exists('jinomeUrlStatic'))
 {
     function jinomeUrlStatic(string $additionalUrlPath)
     {
         return jinomeUrl('static/' . $additionalUrlPath);
     }
 }

 if (!function_exists('jinomeDir'))
 {
    function jinomeDir()
    {
        return basename(str_replace('lib', '', __DIR__));
    }
 }