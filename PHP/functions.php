<?php
GLOBAL $year;
function greet($name)
{
    $y = date("Y");
    return "Hello, " . $name . "! The year is " . $y . ".</br>\n";
}
echo greet("Hehe");
echo "--------------------------</br>\n";
$multiple = fn($x, $y) => $x * $y;
echo "5 multiplied by 10 is: " . $multiple(5, 10) ."</br>\n";
// built-in functions
$names = ["Tuan Nguyen", "John Doe", "Jane Smith"];
echo "Current date and time: " . date("Y-m-d H:i:s") ."</br>\n";
echo count($names) . " names in the list.</br>\n";
echo in_array("John Doe", $names) ? "John Doe is in the list.</br>\n" : "John Doe is not in the list.</br>\n";
echo "--------------------------</br>\n";
// Add an item to the array at the end
array_push($names,"Elon Musk");
print_r($names);
// Add an item to the array at the beginning
array_unshift($names,"First Names");
print_r($names);
// Remove an item from the end
array_pop($names);
print_r($names);
// Remove an item from the beginning
array_shift($names);
print_r($names);
// Remove an item by index
unset($names[1]);
print_r($names);
// Chunk an array into smaller arrays
$chunked = array_chunk($names, 2);
print_r($chunked);
// Merge arrays
$moreNames = ["Alice", "Bob"];
$merged = array_merge($names, $moreNames);
print_r($merged);
// Search for a value and return its index
$index = array_search("Jane Smith", $merged);
echo "Index of Jane Smith: " . $index . "</br>\n";
// Sort an array
sort($merged);
print_r($merged);
// filter an array
$filtered = array_filter($merged, fn($name) => strlen($name) >0);
print_r($filtered);