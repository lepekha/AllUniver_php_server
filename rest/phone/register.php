<?php
        require_once $_SERVER['DOCUMENT_ROOT']."/rest/phone/db.php";
        $phoneMD5 = $_POST['phoneMD5'];
        $stmt = $pdo->prepare("SELECT `id` FROM `UserData` WHERE `phoneMD5` = ?");
        $stmt->execute(array($phoneMD5));

        while ($row = $stmt->fetch(PDO::FETCH_LAZY))
        {
          $id = $row['id'];
        }
        if(empty($id)){
            $stmtCreate = $pdo->prepare("INSERT INTO UserData (phoneMD5,status) VALUES (?,?)");
            $stmtCreate->execute(array($phoneMD5,1));
            http_response_code(201);
            exit();
        }else{
            http_response_code(200);
            exit();
        }
?>