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
/*  
if (!empty($_FILES)) {
	$j = 0;     
	$target_path = "uploads/";     // Declaring Path for uploaded images.
	for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
		
		$validextensions = array("jpeg", "jpg", "png");      
		$ext = explode('.', basename($_FILES['file']['tmp_name'][$i]));  
		$file_extension = end($ext); 
		//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
		$target_path = $target_path . $_FILES['file']['tmp_name'][$i];
		$j = $j + 1;     
		
		if (($_FILES["file"]["size"][$i] < 1500000)     // Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions)) {
		
			//CONVERT BASE64
			$b64image = base64_encode(file_get_contents($_FILES['file']['tmp_name'][$i]));
			$sql = "INSERT INTO tbltest (content) VALUES ('$b64image')";
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			
			/* if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
				// If file moved to uploads folder.
				echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
			} else {     //  If File Was Not Moved.
				echo $j. ').<span id="error">please try again!.</span><br/><br/>';
			} */
			
		} else {     //   If File Size And File Type Was Incorrect.
			echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
		}
	}


} */






$ds = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    //move_uploaded_file($tempFile,$targetFile); //6
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