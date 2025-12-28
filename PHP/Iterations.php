<?php
for ($i = 0; $i < 10; $i++) {
    echo "Iteration number: " . $i . "</br>\n";
}
echo "--------------------------</br>\n";
$i = 0;
while ($i < 10) {
    echo "While loop iteration: " . $i . "</br>\n";
    $i++;
}
echo "--------------------------</br>\n";
$fruits = ["Apple", "Banana", "Orange"];
foreach ($fruits as $i => $fruit) {
    echo "Fruit " . $i . ": " . $fruit . "</br>\n";
}
echo "--------------------------</br>\n";
$persons = [
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
foreach ($persons as $i => $person) {
    echo "" . $i . " Name: " . $person["full_name"] . ", Age: " . $person["age"];
    echo ", Favorite Color: " . $person["favorite_color"] . "</br>\n";
}
echo "--------------------------</br>\n";
$me = [
    "full_name" => "Tuan Nguyen",
    "age" => 18,
    "favorite_color" => "blue"
];
foreach ($me as $key => $value) {
    echo "" . $key . ": " . $value . "</br>\n";
}