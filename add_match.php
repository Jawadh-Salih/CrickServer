<?php

require_once './utilities/Match.class.php';

// $verses = filter_input(INPUT_POST, 'verses');
// $date = filter_input(INPUT_POST, 'date');

$verses = $_GET['verses'];

echo Match::addMatch($verses);