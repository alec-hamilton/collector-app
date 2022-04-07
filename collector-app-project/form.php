<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submit New Entry</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <nav class="nav">
        <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
    </nav>
    <div class="form">
        <h1>Add to collection</h1>
        <form action="form-handling.php" method="post" enctype="multipart/form-data">
            <div class="form-input">
                <label for="artistname">Artist</label>
                <input type="text" id="artistname" name="artist" required>
            </div>
            <div class="form-input">
                <label for="releasename">Release</label>
                <input type="text" id="releasename" name="release" required>
            </div>
            <div class="form-input">
                <label for="labelname">Label</label>
                <input type="text" id="labelname" name="label" required>
            </div>
            <div class="form-input">
                <label for="yearname">Year</label>
                <input type="text" id="yearname" name="year" required>
            </div>
            <div class="dropdown">
                <label for="format">Format</label>
                <select id="format" name="format">
                    <option value="1">7"</option>
                    <option value="2">10"</option>
                    <option value="3">12"</option>
                    <option value="4">2 x 12"</option>
                    <option value="5">3 x 12"</option>
                </select>
            </div>
            <div class="upload">
                <p>Image</p>
                <label for="fileupload" class="upload-button">Upload cover image</label>
                <input type="file" id="fileupload" name="newFile" required>
            </div>
            <div class="submit-button">
                <input id="submit" type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>