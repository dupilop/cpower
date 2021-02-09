
<?php
try {
  $pdo = new PDO("mysql:dbname=cpower;host=localhost", "root", "");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
}

?>