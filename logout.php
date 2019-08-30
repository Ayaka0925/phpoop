<?php

require_once "User.php";
session_start();

session_destroy();

header("Location: login.php");



?>