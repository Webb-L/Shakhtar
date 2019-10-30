<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Shakhtar";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // 设置 PDO 错误模式，用于抛出异常
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM rankinglist";
  $data = [];
  foreach ($conn->query($sql) as $key=>$val){
    $data[] = [$val['username'],$val['crystal'],$val['date']];
  }
  echo(json_encode($data));
}
catch(PDOException $e)
{
//  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
