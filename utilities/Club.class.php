<?php


require_once './DB.php';
require_once './status_codes.php';

// test all these.

Class Club{

	 static function clubnameExists($name) {
        $db = new DB();
        $res = $db->query("SELECT count(name) AS clubcount "
            . "FROM club "
            . "WHERE name='$name'")->fetchAll(PDO::FETCH_ASSOC);

        if ($res[0]['clubcount'] > 0) {
            return true;
        }

        return false;
    }

	static function addClub($clubname,$managerName){
		$db = new DB();

		$clubNameAvailable = Club::clubnameExists($clubname);
		//var_dump($clubNameAvailable);echo "<br>";
        $m_id = $db->query("SELECT user_id FROM user WHERE username='$managerName' AND type='manager'")->fetch(PDO::FETCH_ASSOC);
        //var_dump($m_id);echo "<br>";
        $manager_id = (int) $m_id["user_id"];
        var_dump($manager_id);
       	if($clubNameAvailable == FALSE) // if club name is not available then can add as the manager.
        $res = $db->queryIns("INSERT INTO club (manager_id,name) VALUES ($manager_id,'$clubname')");
        var_dump($res);

               
	} 
}