<?php

require_once 'show-collection.php';
require_once 'db-connection.php';

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
		<?php displayReleases($dbdata); ?>
	</div>
</body>

</html>