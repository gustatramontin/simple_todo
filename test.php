<?php

$input = 'Do my middle school homework';

echo $input;
echo "<br>";

echo urlencode($input);
echo "<br>";


// deflated input
$output = rtrim(strtr(base64_encode(gzdeflate($input, 9)), '+/', '-_'), '=');

echo $output;