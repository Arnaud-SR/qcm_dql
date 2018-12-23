<?php
require('class/cfg.php');
$user = User::getUser();
User::checkIfIsTeacher();

if (isset($_SESSION['id_teacher']) || !QCM::checkIfQcmExist($_GET['uuid_qcm'], $_GET['id_qcm'])) {
    header('Location: index.php');
    die('error');
}
$id_qcm = $_GET['id_qcm'];
$qcm = QCM::getQuestionsByQcmU_unique_id_qcm($_GET['uuid_qcm']);
$countQuestions = count($qcm);
if (filter_input(INPUT_POST, "finish_qcm")) {
    $tabError = [];

    if (!isset($_POST['responses'])) {
        $tabError[] = "Veuillez séléctionnez au moins une réponses, ce serait dommage d'avoir 0 ! :)";
    }

    if (!$tabError) {
        $result = new Results();
        $result->setIdStudent($_SESSION['id_user']);
        $result->setIdQcm($id_qcm);
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
    header('Location: dashboard.php');
    exit;
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
    <h6 class="text-primary">Barème : réponse juste +1 points, chaque réponses fausses cochées enlèvera -0.25, le tout sera ramener sur 20 à la fin (chaque question possède une ou plusieurs réponses possibles)</h6>
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
