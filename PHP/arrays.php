<?php
echo "Welcome to the arrays page! </br>\n";
$fruits = ["Apple", "Banana", "Orange"];
print_r($fruits);
echo "\n";
echo $fruits[0];
echo "\n";
// associative array
$person = [
    [
        "full_name" => "Tuan Nguyen",
        "age" => 18,
        "favorite_color" => "blue"
    ],
    [
        "full_name" => "John Doe",
        "age" => 18,
        "favorite_color" => "black"
    ]
];
print_r($person);
echo "\n";
