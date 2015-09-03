<?php

require_once './Utilities/Club.class.php';

$username = filter_input(INPUT_POST, 'username');
$clubname = filter_input(INPUT_POST,'clubname');

// $username = $_GET['username'];
// $clubname = $_GET ['clubname'];

 echo CLub::addClub($clubname,$username);
//echo CLub::addClub('ccc','bugs');
