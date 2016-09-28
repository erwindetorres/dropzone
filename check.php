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

$sql = "SELECT id,content FROM tbltest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "content: " . $row["content"] . "<br/><br/>";
		//$image = base64_to_jpeg($row["content"], $row["id"] . 'tmp.jpg' );
		//echo "<img src='$image'/><br/><br/>";
		printf('<img src="data:image/png;base64,%s" />', $row["content"]);
    }
} else {
    echo "0 results";
}



function base64_to_jpeg($base64_string, $output_file) {
    $ifp = fopen($output_file, "wb"); 

    $data = explode(',', $base64_string);
	fwrite($ifp, base64_decode($data[0], false)); 
    fclose($ifp); 

    return $output_file; 
}

?>