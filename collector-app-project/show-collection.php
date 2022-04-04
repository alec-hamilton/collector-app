<?php

require_once 'db-connection.php';

$pdo = connectToDb('collector-app');

$dbdata = fetchAllReleaseData($pdo);

function displayReleases(array $data): void
{
    foreach ($data as $release){
        echo '<img src="images/' . $release['image_url'] . '">';
        echo '<h1>' . $release['artist'] . '</h1>';
        echo '<h2>' . $release['release_name'] . '</h2>';
        echo '<p>' . $release['label'] . '</p>';
        echo '<p>' . $release['year'] . '</p>';
        echo '<p>' . $release['format'] . '</p>';
    }
}



displayReleases($dbdata);














echo '<pre>';
print_r($dbdata[0]);
echo '</pre>';

