<?php
// $data = json_decode(file_get_contents("php://input"));
// $empno = mysql_real_escape_string($data->empno);
// $fname = mysql_real_escape_string($data->fname);
// $lname = mysql_real_escape_string($data->lname);
// $dept = mysql_real_escape_string($data->dept);


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$voornaam = $request->voornaam;


$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "company";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO myTable (voornaam)
VALUES ('".$voornaam."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
