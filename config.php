<?php

$dsn = "mysql:host=localhost;dbname=data;charset=utf8";

try {
    $pdo = new PDO($dsn, "php_test", "564");
} catch (Exception $e) {
    //Depois colocar as mensagens de erro para aparecerem somente no log
    echo "Error " . $e->getMessage();
    exit;
}
