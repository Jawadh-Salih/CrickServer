<?php

require_once './Utilities/User.class.php';


 $username = filter_input(INPUT_POST, 'username');
 $password = filter_input(INPUT_POST, 'password');
 $type = filter_input(INPUT_POST,'type');
 $name = filter_input(INPUT_POST,'name');
 $age = filter_input(INPUT_POST,'age');
 $club = filter_input(INPUT_POST,'club');
// $username = $_GET['username'];
// $password =  $_GET['password'];
// $type =  $_GET['type'];
// $name =  $_GET['name'];
// $age =  $_GET['age'];
// $club =  $_GET['club'];// consider this variable. because name under '' can be differ


echo User::add($username,$password,$type,$name,$age,$club);
