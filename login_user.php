<?php
/**
 * Created by PhpStorm.
 * User: Jawadh
 * Date: 8/22/2015
 * Time: 7:24 PM
 */
require_once './Utilities/User.class.php';

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

//$username="jawadh";
//$password="1234";


// echo $username;
// echo " ".$password;
echo User::login($username, $password);
