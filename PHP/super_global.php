<?php
print_r($_SERVER);
print_r($_GET);
if (isset($_GET["a"])) {
    echo "Value of a: " . $_GET["a"] . "\n";
}
print_r($_POST);