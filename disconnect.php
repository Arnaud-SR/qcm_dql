<?php
require_once 'class/cfg.php';
session_start();
session_destroy();
header("Location: index.php");
exit();
