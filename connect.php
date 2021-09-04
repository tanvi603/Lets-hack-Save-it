<?php
/*$uname = $_GET['username'];
$pass = $_GET['password'];*/

$uname = $_POST['username'];
$pass = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = '';
$db_name = "netflix";
$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

/*$sql = "SELECT * FROM user WHERE username = '$uname' AND password = '$pass'";
$result = mysqli_query($conn, $sql);
$check = mysqli_fetch_array($result);*/

$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $uname, $pass);
$stmt->execute();
$result = $stmt->get_result();
$check = mysqli_fetch_array($result);
  
if(isset($check)){
//echo 'success';
header("Location: index.html");
}else{
echo 'Uername or Password Incorrect';
}

?>
