<?php

require_once 'db-connection.php';

function addToDb(array $formData, PDO $pdo): bool
{
    $query = $pdo->prepare(
        'INSERT INTO `releases` (`artist`, `release_name`, `label`, `year`, `format`)'
        . 'VALUES (:artist, :release_name, :label, :year, :format);'
    );

    $artistName = $formData['artist'];
    $releaseName = $formData['release'];;
    $label = $formData['label'];
    $year = $formData['year'];
    $format = $formData['format'];

    $query->bindParam(':artist', $artistName);
    $query->bindParam(':release_name', $releaseName);
    $query->bindParam(':label', $label);
    $query->bindParam(':year', $year);
    $query->bindParam(':format', $format);

    $inserted = $query->execute();

    return $inserted;
}

function dataValidation(array $formData): bool
{
    $year = $formData['year']; // validate year

    if ($year > 1800 && $year < 2150 && is_numeric($year) == true && strlen($year) == 4) {
        return true;
    } else throw new InvalidArgumentException('Invalid year input.');
}

$valid = dataValidation($_POST);

$pdo = connectToDb('collector-app');

$inserted = addToDb($_POST, $pdo);

header("Location: index.php");