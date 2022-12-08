<?php

$servername = "localhost"; // для создания переменной используеться знак $ ,затем имя переменной ,нанадо указывать тип данных php  сам поймет  // http сервера 
$username = "root"; // мое имя 
$password = ""; // мой пороль 
$dbnam = "play_jump_or_dia"; // название моей папки (раздела) на сайте 

// переменные предоставленные пользователем 
$loginUser = $_POST["loginUser"]; // вводим информацию в эти данные 
$loginPass = $_POST["loginPass"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbnam);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username FROM user WHERE username = '" . $loginUser. "'";// user-  название моей таблицы в разделе 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  //  это имя уже занято 
  echo "Username is already taken";
}
 else 
{
  echo "Creating user...";
  //вставляем имя пользователя и пороль в базу данных 
  $sql2 = "INSERT INTO user (username, password, level, coins) VALUES ('" . $loginUser . "', '" . $loginPass . "', 1, 0)";
  if($conn->query($sql2) === TRUE)
  {
    echo "New record created successfully";
  }
  else
  {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
}
$conn->close();
?>