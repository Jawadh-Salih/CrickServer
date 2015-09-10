<?php

require_once './utilities/Match.class.php';

// $verses= filter_input(INPUT_POST,'verses');
// $club = filter_input(INPUT_POST,'club');

$verses = $_GET['verses'];
$club = $_GET['club'];


$result =  Match::getMatchScoreList($verses,$club);

echo json_encode($result); // give the values to android to make the dynamic list.