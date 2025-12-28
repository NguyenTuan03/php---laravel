<?php
$full_name = "Tuan Nguyen";
echo strlen($full_name) . "</br>\n"; // length of string
echo strtolower($full_name) . "</br>\n"; // to lower case
echo strtoupper($full_name) . "</br>\n"; // to upper case
echo str_replace("Tuan", "John", $full_name) . "</br>\n"; // replace substring
echo substr($full_name, 4, 7) . "</br>\n"; // substring
echo trim("   Hello World!   ") . "</br>\n"; // trim whitespace
echo "--------------------------</br>\n";