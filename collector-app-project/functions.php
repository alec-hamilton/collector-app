<?php

/**
 * Get a connection to a MySQL database.
 *
 * utf8mb4 is the recommended character set for modern MySQL databases.
 *
 * The PDO MySQL driver uses emulated prepared statements by default. As MySQL
 * supports prepared statements, emulation is turned off.
 *
 * @param string $db The name of the database.
 * @return PDO A PDO instance representing connection to the database.
 */

function connectToDb(string $db): PDO
{

    $host = 'db';
    $user = 'root';
    $pass = 'password';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $dbConnection = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $excptn) {
        throw new PDOException($excptn->getMessage(), (int)$excptn->getCode());
    }

    return $dbConnection;
}

/**
 * @param PDO $dbConnection The database connection.
 * @param string $sql An SQL statement.
 * @param array|null $params [Optional] An associative array of parameters to be bound named parameters.
 * @return array Rows from the database.
 */

function fetchAll(PDO $dbConnection, string $sql, array $params = null): array
{
    $query = $dbConnection->prepare($sql);

    $query->execute($params);

    return $query->fetchAll();
}

/**
 * @param PDO $dbConnection The database connection.
 * @return array An array with the data from the database.
 */

function fetchAllReleaseData(PDO $dbConnection): array
{
    $sql = 'SELECT `releases`.`id`, `releases`.`artist`, `releases`.`release_name`,'
        . '`releases`.`label`, `releases`.`year`, `formats`.`format`, `releases`.`image_url`'
        . 'FROM `releases`'
        . 'INNER JOIN `formats`'
        . 'ON `releases`.`format` = `formats`.`id`;';

    return fetchAll($dbConnection, $sql);
}

function displayReleases(array $data): string
{
    $releaseComponent = '';

    foreach ($data as $release){
        $releaseComponent .=
            '<div class="release">'
            . '<div class="image-box"><img alt="" src="images/' . $release['image_url'] . '"></div>'
            . '<div class="main-text"><h1>' . $release['artist'] . '</h1>'
            . '<h2>' . $release['release_name'] . '</h2>'
            . '<p>' . $release['label'] . '</p></div>'
            . '<div class="year-release"><p>' . $release['year'] . '</p>'
            . '<p>' . $release['format'] . '</p></div>'
            . '</div>';
    }
    return $releaseComponent;
}

function dataValidation(array $formData): bool
{
    $year = $formData['year']; // validate year

    if ($year > 1800 && $year < 2150 && is_numeric($year) == true && strlen($year) == 4) {
        return true;
    } else return false;
}

function trimImageString(string $successString): string
{
    if (strpos(strtolower($successString), 'success')) {

        $successString = substr($successString, 9);

    } else {

        $successString = 'fail';
    }
    return $successString;
}