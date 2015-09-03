<?php

require_once './utilities/User.class.php';

// $username = filter_input(INPUT_POST,'username');
// $password = filter_input(INPUT_POST,'password');
$username = $_GET['username'];
$password = $_GET['password'];

$result = User::getUser($username,$password);

echo json_encode($result);