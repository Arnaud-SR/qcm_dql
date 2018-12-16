<?php
require('class/cfg.php');
$user = User::getUser();
User::checkIfIsTeacher();
if (isset($_SESSION['id_teacher'])) {
    header('Location: index.php');
    exit;
}
$qcm = QCM::getQuestionsByQcmId($_GET['id_qcm']);

// RECUPERER LES REPONSES DANS LA BOUCLE DIRECT AVEC L ID DE LA QUESTION
?>

<!doctype html>
<html lang="fr">
<head>
    <?php require_once 'head.php' ?>
    <title>Répondre au QCM</title>
</head>
<body>
<form action="" method="post" class="p-1">
    <?php
    foreach ($qcm as $i => $q) {
        $responses = $q->getResponses();
        echo "
<p class='bg-light'>{$q->content}</p>
<ul class='list-unstyled'>";
        foreach ($responses as $k => $r) {
            echo "<li> 
<input type='checkbox' name='responses'>
<label>{$r->response}</label>
</li>";
        }

        echo "</ul>
";
    }
    ?>
    <input type="submit" name="finish_qcm" value="valider le QCM" class="btn btn-primary">
</form>
</body>
</html>
