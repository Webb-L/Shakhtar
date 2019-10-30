<?php
header("content-type:text/html;charset=utf-8");
$data = $_POST;
if (isset($data['name'])) {
  if (strlen($data['name']) >= 3 && strlen($data['name']) <= 12) {
    if (isset($data['crystal'])) {
      if (isset($data['date'])) {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "Shakhtar";
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // 设置 PDO 错误模式，用于抛出异常
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          if ($conn->query("SELECT * FROM rankinglist WHERE username = '{$data['name']}'")->rowCount() > 0) {
            $conn->exec("UPDATE rankinglist SET crystal={$data['crystal']}, date={$data['date']} WHERE username = '{$data['name']}'");
            echo "200";
          } else {
            $conn->exec("INSERT INTO rankinglist (username, crystal, date) VALUES  ('{$data['name']}', {$data['crystal']}, {$data['date']})");
            echo "200";
          }
        } catch (PDOException $e) {
          var_dump($e);
        }

        $conn = null;
      } else {
        echo "错误！请重新开始！";
      }
    } else {
      echo "错误！请重新开始！";
    }
  } else {
    echo "错误！请重新开始！";
  }
} else {
  echo "错误！请重新开始！";
}
