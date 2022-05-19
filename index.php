<?php

require_once 'functions.php';

$pdo = connectToDb('collector-app');
$dbdata = fetchAllReleaseData($pdo);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alec's Record Collection</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <nav class="nav">
        <div class="logo">
            <a href="index.php"><i class="fa-solid fa-compact-disc"></i></a>
            <a class="menu-link" href="index.php">Alec's Record Collection</a>
        </div>
        <a href="form.php"><i class="fa-solid fa-plus"></i></a>
    </nav>
    <div class="release-container">
        <?php echo displayReleases($dbdata); ?>
    </div>
    <footer class="footer">
        <button onclick="window.location.href='#';" class="footer-link">Back to top</button>
    </footer>
</body>

</html>