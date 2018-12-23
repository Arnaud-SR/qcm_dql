<?php
include 'class/cfg.php';
QCM::publishedQcm($_GET['qcm']);
header('Location: dashboard.php');
exit;
?>