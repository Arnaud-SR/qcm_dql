<?php
include 'class/cfg.php';
QCM::publishedQcm($_GET['qcm']);
header('Location: dashBoard.php');
exit;
?>