<?php

require_once 'functions.php';

function uploadFile(): string
{
    try {
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it as invalid.
        if (!isset($_FILES['newFile']['error'])
            || is_array($_FILES['newFile']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['newFile']['error'] value.
        switch ($_FILES['newFile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown error.');
        }

        $tempFilename = $_FILES['newFile']['tmp_name'];

        $fileSize = filesize($tempFilename);

        if ($fileSize === 0) {
            throw new RuntimeException('The file is empty.');
        }

        if ($fileSize > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // As the $_FILES['upfile']['mime'] value could be tampered with we will
        // check it ourselves.
        $finfo = new finfo(FILEINFO_MIME_TYPE);

        $fileFormat = $finfo->file($tempFilename);

        $allowedTypes = [
            'image/png' => 'png',
            'image/jpeg' => 'jpg'
        ];

        $isValidFormat = in_array(
            $fileFormat,
            array_keys($allowedTypes),
            true);

        if (false === $isValidFormat) {
            throw new RuntimeException('Invalid file format.');
        }

        $extension = $allowedTypes[$fileFormat];

        // The uploaded file needs naming uniquely.
        // We should not trust $_FILES['upfile']['name'] in case it contains
        // something dodgy.
        // Hashing the given name will make it both unique and safe.
        $safeUniqueName = sha1_file($tempFilename) . '.' . $extension;

        // __DIR__ is the directory of the current PHP file
        $targetDirectory = __DIR__ . '/images';
        $newFilepath = $targetDirectory . '/' . $safeUniqueName;

        if (!move_uploaded_file($tempFilename, $newFilepath)) {
            throw new RuntimeException('Failed to move uploaded file.');
        }

        return '-success-' . $safeUniqueName;

    } catch (RuntimeException $e) {
        return $e->getMessage();
    }
}

function addToDb(array $formData, PDO $pdo, string $imageName): bool
{
    $query = $pdo->prepare(
        'INSERT INTO `releases` (`artist`, `release_name`, `label`, `year`, `format`, `image_url`)'
        . 'VALUES (:artist, :release_name, :label, :year, :format, :image);'
    );

    $artistName = $formData['artist'];
    $releaseName = $formData['release'];
    $label = $formData['label'];
    $year = $formData['year'];
    $format = $formData['format'];
    $image = $imageName;

    $query->bindParam(':artist', $artistName);
    $query->bindParam(':release_name', $releaseName);
    $query->bindParam(':label', $label);
    $query->bindParam(':year', $year);
    $query->bindParam(':format', $format);
    $query->bindParam(':image', $image);

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

$imageString = uploadFile(); // this calls the function and puts the return value in $imageString

if (strpos(strtolower($imageString), 'success')) { // if the variable contains the string 'success'

    $imageString = substr($imageString, 9); // remove the first 9 characters from -success-

    $valid = dataValidation($_POST); // this is my validation - can ignore

    $pdo = connectToDb('collector-app'); // connect to db

    $inserted = addToDb($_POST, $pdo, $imageString); // add to db
}

header("Location: index.php");