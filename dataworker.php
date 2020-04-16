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
    $mm[0] = from_php_std_to_html($mm[0]);
    $mm[1] = from_php_std_to_html($mm[1]);
    return $mm;
}

function from_html_std_to_php($date)
{
    $xdate = date_create_from_format("Y-m-d", $date);
    $resdate = date_format($xdate, "j-n-Y");
    return $resdate;
}
function from_php_std_to_html($date)
{
    $xdate = date_create_from_format("j-n-Y", $date);
    $resdate = date_format($xdate, "Y-m-d");
    return $resdate;
}

function statisticoneday($date)
{
    $dir = 'data';
    if (!is_dir($dir)) {
        echo "static not found";
        return "Папки статистистик не найдена!";
    }
    $file = './data/' . $date . ".json";
    if (!file_exists($file)) {
        return "На сегодня нет статистики!";
    }

    $jsonfiledata = file_get_contents($file);
    $jsonarray = json_decode($jsonfiledata, true);
    return $jsonarray;
}

function test($x)
{
    return $x;
}
function test2($x, $y)
{
    $x = $x . $y;
    return $x;
}
