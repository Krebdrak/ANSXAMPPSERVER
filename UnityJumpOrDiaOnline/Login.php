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

$sql = "SELECT password FROM user WHERE username = '" . $loginUser. "'";// user-  название моей таблицы в разделе 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   if($row["password"] == $loginPass)
   {
      echo "Login Success.";
      //нужно убедиться что это действительно наш пользователь и он может получить привилегии 
   }
   else
   {
     echo "Wrong Credentials.";
   }
  }
} else 
{
  echo "Username does not exists";
}
$conn->close();
?>