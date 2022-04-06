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
	<title>Page Title</title>
	<link href="css/normalize.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <?php include "header.html"; ?>
	<div class="release-container">
		<?php echo displayReleases($dbdata); ?>
	</div>
    <footer class="footer">
        <a class="footer-link" href="index.php">Back to top</a>
    </footer>
</body>

</html>