<?php

function getnamefiles()
{
    $dir = 'data';
    if (!is_dir($dir)) {
        return "Statistic not found";
    }

    $files = array();

    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $renamedstr = str_replace(".json", "", $entry);
                $files[] = $renamedstr;
            }
        }
        closedir($handle);
    } else echo "Error open or read dir";
}
getnamefiles();
