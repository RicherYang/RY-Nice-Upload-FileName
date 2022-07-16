<?php
/*
 * Plugin Name: RY Nice Upload FileName
 * Plugin URI: https://ry-plugin.com/ry-nice-upload-filename
 * Description: Rewrite upload filename if not english or number letter
 * Version: 1.0.5.1
 * Requires at least: 5.6
 * Requires PHP: 7.4
 * Author: Richer Yang
 * Author URI: https://richer.tw/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
*/

function_exists('plugin_dir_url') or exit('No direct script access allowed');

add_filter('sanitize_file_name', 'RY_NUFN_sanitize_file_name');
function RY_NUFN_sanitize_file_name($file_name)
{
    if (!preg_match('@^[a-z0-9][a-z0-9\-_\.]*$@i', $file_name)) {
        $parts = explode('.', $file_name);
        $extension = array_pop($parts);
        $file_name = substr(md5($parts[0]), 0, 10) . '.' . $extension;
    }

    return $file_name;
}
