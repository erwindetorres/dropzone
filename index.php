<!DOCTYPE html>

<meta charset="utf-8">

<title>Dropzone Upload Files</title>

<script src="js/dropzone.js"></script>
<link rel="stylesheet" href="css/dropzone.css">
<link rel="stylesheet" href="css/eric_meyer_style.css">

<section>

	<h1 id="try-it-out">Dragzone File Upload</h1>

	<div id="dropzone">
		<form action="index.php" class="dropzone needsclick" id="demo-upload">
			<div class="dz-message needsclick">
				Drop files here or click to upload.<br />
			</div>
		</form>
	</div>

</section>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "images_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$ds = DIRECTORY_SEPARATOR;
 
$storeFolder = 'uploads';
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];            
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
     
    $targetFile =  $targetPath. $_FILES['file']['name'];
 
    //move_uploaded_file($tempFile,$targetFile);
     //CONVERT BASE64
	$b64image = base64_encode(file_get_contents($tempFile));
	$sql = "INSERT INTO tbltest (content) VALUES ('$b64image')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>