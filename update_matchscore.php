<?php

require_once './utilities/Match.class.php';

$user_id = filter_input(INPUT_POST,'user_id');
$verses = filter_input(INPUT_POST,'verses');
$score = filter_input(INPUT_POST,'score');
$wickets = filter_input(INPUT_POST,'wickets');
$extras = filter_input(INPUT_POST,'extras');
$overs = filter_input(INPUT_POST,'overs');

echo Match::addClubScore($user_id,$score,$wickets,$extras,$overs);