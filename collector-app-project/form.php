<?php
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
    <div>
        <form action="form-handling.php" method="post" enctype="multipart/form-data">
            <label for="artistname">Artist</label>
            <input type="text" id="artistname" name="artist" required><br>
            <label for="releasename">Release name</label>
            <input type="text" id="releasename" name="release" required><br>
            <label for="labelname">Label</label>
            <input type="text" id="labelname" name="label" required><br>
            <label for="yearname">Year</label>
            <input type="text" id="yearname" name="year" required><br>
            <label for="format">Format</label>
            <select id="format" name="format" required>
                <option value="1">7"</option>
                <option value="2">10"</option>
                <option value="3">12"</option>
                <option value="4">2x12"</option>
            </select><br>
            <label for="fileupload">Upload cover image</label>
            <input type="file" id="fileupload" name="newFile" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>