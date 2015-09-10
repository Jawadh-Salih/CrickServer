<?php

require_once './utilities/Match.class.php';


$verses = filter_input(INPUT_POST, 'verses');
$manager_id = filter_input(INPUT_POST, 'user_id');
$match_score = filter_input(INPUT_POST, 'score');
$status = filter_input(INPUT_POST, 'status');

// $verses = $_GET['verses'];
// $manager_id = $_GET['user_id'];
// $match_score = $_GET['score'];
// $status = $_GET['status'];

echo Match::addClubScore($verses,$manager_id,$match_score,$status);