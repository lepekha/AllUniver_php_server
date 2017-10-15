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
            http_response_code(404);
            exit();
        }else{
            $delete_user = $pdo->prepare("DELETE FROM `UserData` WHERE `id`=?");
            $delete_user->execute(array($id));
            http_response_code(200);
            exit();
        }
        $pdo = null;
?>