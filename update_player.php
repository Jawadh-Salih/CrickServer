<?php

require_once './Player.class.php';

$p_id = $_GET['player_id'];

echo Player::updateScore($p_id);