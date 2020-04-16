<?php

//tests for functions
include_once 'dataworker.php';

function test_from_html_std_to_php($date)
{
    $x = from_html_std_to_php($date);
    return $x;
}
function test_from_php_std_to_html($date)
{
    $x = from_php_std_to_html($date);
    return $x;
}

$testdatephp = "2-4-2020";
$testdatehtml = "2020-04-02";

echo "from \"" . $testdatephp . "\" test_from_php_std_to_html($testdatephp) " . "result :<br>";
echo "&emsp;=>: " . test_from_php_std_to_html($testdatephp);
echo "<br>";
echo "<br>";
echo "from \"" . $testdatehtml . "\" test_from_html_std_to_php($testdatehtml) " . "result :<br>";
echo "&emsp;=>: " . test_from_html_std_to_php($testdatehtml);
