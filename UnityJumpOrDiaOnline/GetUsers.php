<?php
$servername = "localhost"; // для создания переменной используеться знак $ ,затем имя переменной ,нанадо указывать тип данных php  сам поймет  // http сервера 
$username = "root"; // мое имя 
$password = ""; // мой пороль 
$dbnam = "play_jump_or_dia"; // название моей папки (раздела) на сайте 


// Create connection
$conn = new mysqli($servername, $username, $password, $dbnam);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully.<br><br>";

$sql = "SELECT username, level FROM user"; // user-  название моей таблицы в разделе 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "username: " . $row["username"]. " - level: " . $row["level"]."<br>";  //"<br>" разрыв для создания новой строки 
  }
} else 
{
  echo "0 results";
}
$conn->close();
?>