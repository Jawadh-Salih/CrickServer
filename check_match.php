<?php

require_once './utilities/Match.class.php';
$match_id = $_GET['match_id'];

echo Match::matchExists($match_id);