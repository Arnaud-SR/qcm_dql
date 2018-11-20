<?php
require_once("class/cfg.php");
if (!isset($_SESSION['id_user'])) {
  header("Location: index.php");
  exit;
}
$tabError = [];
$cnx = Connexion::getInstance();
if (filter_input(INPUT_POST, "submitQuestion")) {
    $question = new Question();

    $question->title = filter_input(INPUT_POST, "question_title", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $question->id_teacher = $_SESSION['id_user'];
    $question->theme = filter_input(INPUT_POST, "select_theme", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

    if (!$tabError) {
        $question->addQuestion();
        //Recupère l'id de la question qui vient d'être enregistrée en base
        $id_question = $cnx->pk();
        if (isset($_POST['response_a_title'])) {
            $responseA = new Response();
            $responseA->content = filter_input(
                INPUT_POST,
                "response_a_title",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
            $responseA->addResponse($id_question);
            if (isset($_POST['a_is_correct'])) {
                $id_a = $cnx->pk();
                Response::setIsCorrect($id_question, $id_a);
            }
        }
        if (isset($_POST['response_b_title'])) {
            $responseB = new Response();
            $responseB->content = filter_input(
                INPUT_POST,
                "response_b_title",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
            $responseB->addResponse($id_question);
            if (isset($_POST['b_is_correct'])) {
                $id_b = $cnx->pk();
                $responseB->setIsCorrect($id_question, $id_b);
            }
        }
        if (isset($_POST['response_c_title'])) {
            $responseC = new Response();
            $responseC->content = filter_input(
                INPUT_POST,
                "response_c_title",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
            $responseC->addResponse($id_question);
            if (isset($_POST['c_is_correct'])) {
                $id_c = $cnx->pk();
                $responseC->setIsCorrect($id_question, $id_c);
            }
        }
        if (isset($_POST['response_d_title'])) {
            $responseD = new Response();
            $responseD->content = filter_input(
                INPUT_POST,
                "response_d_title",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
            $responseD->addResponse($id_question);
            if (isset($_POST['d_is_correct'])) {
                $id_d = $cnx->pk();
                $responseD->setIsCorrect($id_question, $id_d);
            }
        }

        header('Location: dashboard.php');
        exit();
    }

}

$user = User::getUser();
User::checkIfIsTeacher();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'head.php' ?>
  <title>Tableau de bord</title>
</head>
<body>
  <header class="d-flex container-fluid bg-info text-white " style="height:140px;padding: 20px 5vw;">
    <h1> Gestionnaire de QCM
      <?php
      if (isset($_SESSION['is_teacher'])) {
        echo "pour les enseignants";
      }else{
        echo "pour les étudiants";
      }
      ?>
    </h1>
    <h2 class="d-flex justify-self-center align-self-center" style="padding:185px;" > Bienvenue, <?= $user->prenom ?> </h2>
    <div class="align-self-end"> <!-- bouton react -->                <!-- <img src="powerOff.png" alt=""> -->
      <a href="disconnect.php" class="btn btn-danger" style="padding:10px 20px;">
        Se déconnecter
      </a>
    </div>
  </header>
  <main style="height: 100vw;">
    <div class="row" >
      <div id="nav" class="col-3" >
        <?php
        if (isset($_SESSION['is_teacher'])) {
          require('teacher/_nav1.php');
        }else{
          require('student/_nav0.php');
        }
        ?>
      </div>
      <div id="index" class="col-9">
        <?php
        if (isset($_SESSION['is_teacher'])) {
          require('teacher/_index1.php');
        }else{
          require('student/_index0.php');
        }
        ?>
      </div>
    </div>
  </main>
</body>
</html>
