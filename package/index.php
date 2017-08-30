<?php
/**
 * Created by PhpStorm.
 * User: OOM-Administrator
 * Date: 2017/8/30
 * Time: 10:17
 */

/**
 * @param $text
 * @param $url
 * @param array $option
 *
 */
function html_a($text, $url, $option = array())
{
    echo '<a href="' . $url . '" class="' . $option["class"] . '">' . $text . '</a>';
}

/**
 * 列出所有排序文件路径
 */
function showSortFile($filedir)
{

    $dir = @ dir($filedir);
    while (($file = $dir->read()) !== false) {
        if (is_dir($filedir . "/" . $file) && ($file != ".") && ($file != "..")) {
            showSortFile($filedir . "/" . $file);
        } else if (($file != ".") && ($file != "..")) {
            html_a("filename: " . $filedir . "/" . $file, $filedir . "/" . $file);
            echo "<br />";
        }
    }
    $dir->close();

}

print_r("排序算法");
showSortFile(".");
