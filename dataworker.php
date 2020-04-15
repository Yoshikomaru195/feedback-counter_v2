<?php

function get_name_files()
{
    $dir = 'data';
    if (!is_dir($dir)) {
        echo "Statistic not found";
        return;
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
    } else {
        echo "Error open or read dir";
        return;
    }
    return $files;
}

function sorted_str_date_array()
{
    $files =  get_name_files();

    usort($files, function ($a, $b) {
        $dateTimestamp1 = strtotime($a);
        $dateTimestamp2 = strtotime($b);
        return $dateTimestamp1 < $dateTimestamp2 ? -1 : 1;
    });
    return $files;
}

function get_min_max_date()
{
    $files = sorted_str_date_array();
    $minmax = array();
    $minmax[] = $files[0];
    $minmax[] = $files[count($files) - 1];
    return $minmax;
}

function get_html_min_max_date()
{
    $mm = get_min_max_date();
    $d1 = explode("-", $mm[0]);
    $d2 = explode("-", $mm[1]);

    if (strlen($d1[1]) == 1) $d1[1] = "0" . $d1[1];
    if (strlen($d2[1]) == 1) $d2[1] = "0" . $d2[1];
    if (strlen($d1[0]) == 1) $d1[0] = "0" . $d1[0];
    if (strlen($d2[0]) == 1) $d2[0] = "0" . $d2[0];

    $rfd1 = $d1[2] . "-" . $d1[1] . "-" . $d1[0];
    $rfd2 = $d2[2] . "-" . $d2[1] . "-" . $d2[0];

    $res = array();
    $res[] = $rfd1;
    $res[] = $rfd2;

    return $res;
}
