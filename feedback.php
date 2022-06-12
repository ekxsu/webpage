<?php

$name=$_POST["name"]; 
$email=$_POST["email"];
$relationship=$_POST["relationship"];
$strength=$_POST["strength"];
$software=$_POST["software"];
$message=$_POST["message"];

$conn = new mysqli('localhost', 'root','','feedback');
if ($conn->connect_error) 
{
echo "$conn->connect error";
die ("Connection Failed :". $conn->connect_error); 
} 
else 
{ 
$stmt = $conn->prepare ("insert into feedback(name, email, relationship, strength, software, message) values (?, ?, ?, ?, ?, ?)"); 
$stmt->bind_param("ssssss", $name, $email, $relationship, $strength, $software, $message); 
$execval = $stmt->execute(); 
echo "Feedback reported successfully...";
$stmt->close(); 
$conn->close();
}
?>