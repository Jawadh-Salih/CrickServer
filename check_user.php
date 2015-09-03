<?php

require_once './Utilities/User.class.php';

$username = filter_input(INPUT_POST, 'username');

//$username="jawadh";
//$password="1234";


// echo $username;
// echo " ".$password;
echo User::usernameExists($username);
