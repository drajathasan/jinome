<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-06-26 01:01:38
 * @modify date 2022-07-08 21:15:34
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

if (!function_exists('addOrUpdateSetting')) {
    /**
     * Took from index.php at system modules
     *
     * @param [type] $name
     * @param [type] $value
     * @return void
     */
    function addOrUpdateSetting($name, $value) {
        global $dbs;
        $sql_op = new simbio_dbop($dbs);
        $data['setting_value'] = $dbs->escape_string(serialize($value));

        $query = $dbs->query("SELECT setting_value FROM setting WHERE setting_name = '{$name}'");
        if ($query->num_rows > 0) {
            // update
            $sql_op->update('setting', $data, "setting_name='{$name}'");
        } else {
            // insert
            $data['setting_name'] = $name;
            $sql_op->insert('setting', $data);
        }
    }
}