<?php

require_once 'db-connection.php';

$pdo = connectToDb('collector-app');

$dbdata = fetchAllReleaseData($pdo);

echo '<pre>';
print_r($dbdata);
echo '</pre>';

