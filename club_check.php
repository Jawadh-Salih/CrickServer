<?php
require_once './utilities/Club.class.php';

$club = filter_input(INPUT_POST, 'club');

$club = $_GET['club'];

echo Club::clubnameExists($club);