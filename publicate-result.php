<?php
require('class/cfg.php');
$user = User::getUser();
User::checkIfIsTeacher();

if (!isset($_GET['id_result']) || !Results::checkIfIdResultExist(
        $_GET['id_result']
    ) || isset($_SESSION['id_teacher'])) {

    header('Location: index.php');
    exit;
}
Results::publicateResult($_GET['id_result']);
header('Location: dashboard.php');
exit;
