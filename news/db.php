<?php

class Mydb{

$servername = "localhost";
$username = "root";
$password = "naveen123";
$dbname = "news";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function getData(){
$sql = "SELECT * from md_media_contact";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["media_contact_name"];
    }
} else {
    echo "0 results";
}
$conn->close();
}
}
?>