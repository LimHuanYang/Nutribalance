<?php
include("conn.php");
$email = $_POST['email'];
$password = $_POST['password'];
$query = "SELECT UID,email,password FROM user WHERE email ='$email'AND password='$password'";
$result = mysqli_query($conn, $query);
$response = array();
if ($result->num_rows > 0) {
$row=$result->fetch_assoc();
  $response['status'] = 'success';
  $response['UID'] = $row['UID'];
} else {
  $response['status'] = 'error';
  $response['message'] = "Wrong Password or Email. " . $conn->error;
}
header('Content-Type: application/json');
echo json_encode($response);
$conn->close();
?>