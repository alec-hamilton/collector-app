<?php

require_once 'db-connection.php';

$pdo = connectToDb('collector-app');

$dbdata = fetchAllReleaseData($pdo);

function displayReleases(array $data): void
{
    foreach ($data as $release){
        $releaseComponent =
            '<div class="release">'
            . '<img src="images/' . $release['image_url'] . '">'
            . '<h1>' . $release['artist'] . '</h1>'
            . '<h2>' . $release['release_name'] . '</h2>'
            . '<p>' . $release['label'] . '</p>'
            . '<p>' . $release['year'] . '</p>'
            . '<p>' . $release['format'] . '</p>'
            . '</div>';
        echo $releaseComponent;
    }
}
