<?php
echo "Upload feature page";
?>


<?php

if(isset($_POST['upload'])){

$target = "uploads/" . basename($_FILES["file"]["name"]);

move_uploaded_file($_FILES["file"]["tmp_name"], $target);

echo "File uploaded successfully";

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Upload File</title>
</head>

<body>

<h2>Upload File</h2>

<form method="POST" enctype="multipart/form-data">

<input type="file" name="file">

<button type="submit" name="upload">Upload</button>

</form>

</body>
</html>


