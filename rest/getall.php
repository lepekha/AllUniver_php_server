<?php
        require_once $_SERVER['DOCUMENT_ROOT']."/rest/phone/db.php";
      /*$user = "id3267118_rootruslan";
        $pass = "rlo1992";
        $pdo = new PDO('mysql:host=localhost;dbname=id3267118_alluniver', $user, $pass,array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
        );
        $pdo->exec('SET NAMES utf8 COLLATE utf8_general_ci;');*/
        $stmt = $pdo->prepare("SELECT `id` FROM `UserData` WHERE `phoneMD5` = ?");
        $stmt->execute(array("b57ddeabcf764d26557adf4aa828066b","37a6259cc0c1dae299a7866489dff0bd","bd8f8ee92958e0ec7ff961cf1104f5e8"));

        while ($row = $stmt->fetch(PDO::FETCH_LAZY))
        {
          echo $row['id']."<br>";
        }
?>