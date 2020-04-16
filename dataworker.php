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



function valid_post()
{
    if ($_POST["firstdate"] != "") {
        $x1 = from_html_std_to_php($_POST["firstdate"]);
    }
    if ($_POST["firstdate"] != "" && $_POST["seconddate"] != "") {
        $x1 = from_html_std_to_php($_POST["firstdate"]);
        $x2 = from_html_std_to_php($_POST["seconddate"]);
        $dates[] = $x1;
        $dates[] = $x2;
        return $dates;
    }
    if (($_POST["firstdate"] == "" && $_POST["seconddate"] != "")) {
        return 'Ошибка:<br>
    Если это произошло и вы не знаете в чём дело, обратитесь авторам, либо
    перезагрузите страницу без повтора отравки<br>
    $_POST["firstdate"] == "" but $_POST["seconddate"] != ""';
    }
    if ($_POST["firstdate"] == "" && $_POST["seconddate"] == "") {
        $x1 = date("j-n-Y");
        $date = statisticoneday($x1);
        return $date;
    }
}

function get_statistic($dates)
{
    if (count($dates) == 1) {
        $file = './data/' . $dates[0] . ".json";
        if ($filedata = file_get_contents($file) !== FALSE) {
            if ($jsondata = json_encode($filedata) !== FALSE) {
                return $jsondata;
            } else {
                echo "Error to readfile";
            }
        }
    }
    if (count($dates) == 2) {
    }
}
function readfiles_from_to($dates)
{
    $start = 0;
    $end = 0;
    $files = sorted_str_date_array();
    for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] == $dates[0]) {
            $start = $i;
        }
        if ($files[$i] == $dates[1]) {
            $end = $i + 1;
        }
    }
    $partfiles = array();
    for ($start; $start < $end; $start++) {
        $partfiles[] = $files[$start] . ".json";
    }
    return $partfiles;
}
