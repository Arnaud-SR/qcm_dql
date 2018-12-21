<?php
require('class/cfg.php');
$user = User::getUser();
User::checkIfIsTeacher();
if (isset($_SESSION['id_teacher'])) {
    header('Location: index.php');
    exit;
}
$qcm = QCM::getQuestionsByQcmId($_GET['id_qcm']);
$countQuestions = count($qcm);
if (filter_input(INPUT_POST, "finish_qcm")) {
    $tabError = [];

    if (!isset($_POST['responses'])) {
        $tabError[] = "Veuillez séléctionnez au moins une réponses, ce serait dommage d'avoir 0 ! :)";
    }

    if (!$tabError) {
        $result = new Results();
        $result->setIdStudent($_SESSION['id_user']);
        $result->setIdQcm($_GET['id_qcm']);
        $mark = 0;
        $tabIdQuestion = [];
        $tabIdResponse = [];

        foreach ($_POST['responses'] as $response) {
            $explode = explode('|', $response);
            $tabIdResponse[] = $explode[0];
            $tabIdQuestion[] = $explode[1];
            $tabReponsesChecked = [];
            $str = '|'.$explode[1];
            $tabReponsesChecked[] = explode($str, $response);
            $tabAllResponse = array_unique($tabIdResponse);
            $tabAllQuestion = array_unique($tabIdQuestion);
        }

        foreach ($_POST['responses'] as $response) {
            $explode = explode('|', $response);
            $id_response = $explode[0];
            $id_question = $explode[1];

            $responsesCorrect = Question::getIdResponsesWithIdQuestion($id_question);

            $tabResponsesCorrect = [];
            foreach ($responsesCorrect as $a) {
                $tabResponsesCorrect[] = (int)$a->id_response;
            }

            if (in_array($id_response, $tabResponsesCorrect)) {
                $mark++;
            } else {
                $mark -= 0.25;
            }
        }
        $finalResult = $mark * (20 / $countQuestions);

        if ($finalResult > 20) {
            $finalResult = 20;
        } elseif ($finalResult < 0) {
            $finalResult = 0;
        }

        $result->setResult($finalResult);
        $result->addResult();
    } else {
        $tabErrorString = implode('', $tabError);
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <?php require_once 'head.php' ?>
    <title>Répondre au QCM</title>
</head>
<body>
<form action="" method="post" class="p-1">
    <span class="text-danger"><?php
        if (isset($tabErrorString)) {
            echo "<span class='text-danger'>$tabErrorString</span>";
        }
        ?></span>
    <?php
    foreach ($qcm as $i => $q) {
        $responses = $q->getResponses();

        echo "
<p class='bg-light'>{$q->content}</p>
<ul class='list-unstyled'>";
        foreach ($responses as $k => $r) {
            echo "<li> 
<input type='checkbox' name='responses[]' value='{$r->id_response}|{$q->getIdQuestion()}'>
<label>{$r->response}</label>
</li>";
        }
        echo "</ul>";
    }
    ?>
    <input type="submit" name="finish_qcm" value="valider le QCM" class="btn btn-primary">
</form>
</body>
</html>
