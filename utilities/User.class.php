<?php


require_once './DB.php';
require_once './status_codes.php';
require_once './utilities/Club.class.php';

class User {

    static function login($username, $passwordRaw) {
        if ($username == FALSE || $passwordRaw == FALSE || $username == NULL || $passwordRaw == NULL) {
            return ERROR_USERNAME_NOT_FOUND;
        }

        $password = hash('md5', $passwordRaw);
         // $password = $passwordRaw;
        $db = new DB();
        if (User::usernameExists($username) == TRUE) {
            $res = $db->query("SELECT password FROM user WHERE username='$username'")->fetchAll(PDO::FETCH_ASSOC);
            //print_r($res);
            $user = $res[0];
            if ($user['password'] == $password) {
                return SUCCESS_LOGIN;
            } else {
                return ERROR_INVALID_PASSWORD;
            }
        } else {
            return ERROR_USERNAME_NOT_FOUND;
        }
    }
    static function usernameExists($username) {
        $db = new DB();
        $res = $db->query("SELECT count(username) AS usercount "
            . "FROM user "
            . "WHERE username='$username'")->fetchAll(PDO::FETCH_ASSOC);

        if ($res[0]['usercount'] > 0) {
            return true;
        }

        return false;
    }
    static function getID($username) {
        $db = new DB();
        $res = $db->query("SELECT id FROM user WHERE username='$username'")->fetchAll(PDO::FETCH_ASSOC);
        return $res[0]['id'];
    }
    static function add($username,$passwordRaw,$type,$name,$age,$club) {//
        $db = new DB();
        $usernameAvailable = User::usernameExists($username);
        $clubnameAvailable = Club::clubnameExists($club);
        $password = hash('md5', $passwordRaw);
 //           $usernameAvailable = TRUE;
        if ($usernameAvailable == FALSE ) {
            $res = $db->queryIns("INSERT INTO user(username,password,type) VALUES('$username','$password','$type')");

            $u_id = $db-> query("SELECT user_id FROM user WHERE username='$username'")->fetch(PDO::FETCH_ASSOC);//->fetch(PDO::FETCH_ASSOC)
            $c_id = $db->query("SELECT club_id FROM club WHERE name = '$club'")->fetch(PDO::FETCH_ASSOC);
            $user_id =(int) $u_id['user_id'];         
            $club_id = (int) $c_id['club_id'];
            $agein = (int)$age;
            var_dump($clubnameAvailable);
            if($type == "player" AND $clubnameAvailable == TRUE){
                $res = $db->queryIns("INSERT INTO player (player_id,club_id,name,age) VALUES ($user_id,$club_id,'$name',$agein)");//  

            }
            if($type = "manager"){
                $res = $db->queryIns("INSERT INTO manager (manager_id,name,age) VALUES ($user_id,'$name',$agein)"); // this is ok.
               // $result = $db->query("INSERT INTO club (manager_id,name) VALUES ($user_id,'$club')");
                var_dump($name);
            }

        } else {
            echo 0;
        }

    }
    static function getUser($username,$password){
        $db = new DB();

        $passWordhash = hash('md5', $password);
        $sql = "SELECT user_id,type FROM user WHERE username ='$username' AND password='$passWordhash'";
        $result = $db->query($sql);
        //var_dump($result);
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;  
    }
    
   
}