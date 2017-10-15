<?php
        require_once $_SERVER['DOCUMENT_ROOT']."/rest/phone/db.php";
        $phoneMD5 = $_POST['phoneMD5'];
        $schedule = $_POST['schedule'];
        $security = $_POST['security'];
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
            $updateUser = $pdo->prepare("UPDATE `UserData` SET UserData.CONTENT=?, UserData.security=? WHERE  UserData.phoneMD5 = ?");
            $updateUser->execute(array($schedule,$security,$phoneMD5));
            http_response_code(200);
            exit();
        }
        $pdo = null;
?>