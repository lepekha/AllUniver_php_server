<?php
        require_once $_SERVER['DOCUMENT_ROOT']."/rest/phone/db.php";
        $phoneMD5 = $_POST['phoneMD5'];
        $mySchedule = $_POST['mySchedule'];
        $stmt = $pdo->prepare("SELECT * FROM `UserData` WHERE `phoneMD5` = ?");
        $stmt->execute(array($phoneMD5));

        while ($row = $stmt->fetch(PDO::FETCH_LAZY))
        {
          $id = $row['id'];
          $security = $row['security'];
          $schedule = $row['CONTENT'];
        }
        if(empty($id)){
            http_response_code(404);
            exit();
        }else{
            if($mySchedule == 0){
				if($security == 1){
                    http_response_code(200);
                    exit();
				}else{
                    http_response_code(200);
                    echo $schedule; 
                    exit();
				}
            }
            echo $schedule; 
            http_response_code(200);
            exit();
        }
        $pdo = null;
?>