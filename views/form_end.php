<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Uploads</title>
    <link href="styles/form.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Uploading Files</h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

<p>
<label for="filename">Select File:</label>
<input type="file" name="filename" id="filename">
</p>
<p>
<input type="submit" name="upload" value="Upload File">
</p>
</form>
</body>
</html>