<?php
$age = 18;
if ($age < 0) {
    echo "Invalid age.</br>\n";
} elseif ($age < 18) {
    echo "You are a minor.</br>\n";
} else {
    echo "You are an adult.</br>\n";
}
echo "=========================";
echo "</br>\n";
$cmts = [
    "Great post!",
    "Very informative.",
    "Thanks for sharing."
];
if (empty($cmts)) {
    echo "No comments available.\n";
} else {
    echo "Comments:</br>\n";
    for ($i = 0; $i < count($cmts); $i++) {
        echo "- " . $cmts[$i] . "</br>\n";
    }
}
echo "=========================";
echo "</br>\n";
echo $firstName ?? "Guest"; // Null coalescing operator
echo "=========================";
echo "</br>\n";
// switch case I know it :))