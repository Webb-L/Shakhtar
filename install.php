<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Shakhtar";
// 创建连接
$conn = new mysqli($servername, $username, $password);
// 检测连接
if ($conn->connect_error) {
  die("连接失败: " . $conn->connect_error);
}

// 创建数据库
$sql = "CREATE DATABASE Shakhtar";
if ($conn->query($sql) === TRUE) {
  echo "数据库创建成功";
} else {
  echo "Error creating database: " . $conn->error;
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // 设置 PDO 错误模式，用于抛出异常
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // 使用 sql 创建数据表
  $sql = "CREATE TABLE RankingList (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30) NOT NULL,crystal integer NOT NULL,date integer NOT NULL)";

  // 使用 exec() ，没有结果返回
  $conn->exec($sql);
  echo "数据表 MyGuests 创建成功";
}
catch(PDOException $e)
{
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
$conn = null;
