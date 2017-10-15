<?php
        require_once $_SERVER['DOCUMENT_ROOT']."/rest/phone/db.php";
        require_once $_SERVER['DOCUMENT_ROOT']."/rest/phone/Contacts.php";
        $contactsMD5 = $_POST['contactsMD5'];

        $oldListContacts = json_decode($contactsMD5,true);
        $stmt = $pdo->prepare("SELECT * FROM `UserData` WHERE `phoneMD5` = ? AND `security` = ?");
      
        for ($i = 0; $i < count($oldListContacts); $i++) {
            $stmt->execute(array($oldListContacts[$i]["phone"],0));
            while ($row = $stmt->fetch(PDO::FETCH_LAZY))
            {
              $phone = $row['phoneMD5'];
              $contacts = new Contacts();
              $contacts->id = $oldListContacts[$i]["id"];
              $contacts->name = $oldListContacts[$i]["name"];
              $contacts->phone = $row['phoneMD5'];
              $names[] = $contacts;
            }
        }
        http_response_code(200);
        print json_encode($names, JSON_UNESCAPED_UNICODE);
?>