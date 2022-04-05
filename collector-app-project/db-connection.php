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

