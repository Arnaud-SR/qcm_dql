<?php
require_once("class/cfg.php");

if (!isset($_SESSION['id_user'])) {
  header("Location: index.php");
  exit;
}
$qcmNoPublished = QCM::getQcmList();
$qcmPublished = QCM::getQcmList(1);

$tabError = [];
$cnx = Connexion::getInstance();
if (filter_input(INPUT_POST, "submitQuestion")) {
  $question = new Question();

  $question->setTitle(filter_input(INPUT_POST, "question_title", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
  $question->setIdTeacher($_SESSION['id_user']);
  $question->setTheme(filter_input(INPUT_POST, "select_theme", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

  if (!$tabError) {
    $question->addQuestion();
    //Recupère l'id de la question qui vient d'être enregistrée en base
    $id_question = $cnx->pk();
    if (!empty($_POST['response_a_title'])) {
      $responseA = new Response();
      $responseA->setContent(
        filter_input(
          INPUT_POST,
          "response_a_title",
          FILTER_SANITIZE_STRING,
          FILTER_FLAG_NO_ENCODE_QUOTES
          )
        );
        $responseA->addResponse($id_question, isset($_POST['a_is_correct']) ? 1 : 0);
      }
      if (!empty($_POST['response_b_title'])) {
        $responseB = new Response();
        $responseB->setContent(
          filter_input(
            INPUT_POST,
            "response_b_title",
            FILTER_SANITIZE_STRING,
            FILTER_FLAG_NO_ENCODE_QUOTES
            )
          );
          $responseB->addResponse($id_question, isset($_POST['b_is_correct']) ? 1 : 0);
        }
        if (!empty($_POST['response_c_title'])) {
          $responseC = new Response();
          $responseC->setContent(
            filter_input(
              INPUT_POST,
              "response_c_title",
              FILTER_SANITIZE_STRING,
              FILTER_FLAG_NO_ENCODE_QUOTES
              )
            );
            $responseC->addResponse($id_question, isset($_POST['c_is_correct']) ? 1 : 0);
          }
          if (!empty($_POST['response_d_title'])) {
            $responseD = new Response();
            $responseD->setContent(
              filter_input(
                INPUT_POST,
                "response_d_title",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
                )
              );
              $responseD->addResponse($id_question, isset($_POST['d_is_correct']) ? 1 : 0);
            }

            header('Location: dashboard.php');
            exit();
          }

        }


// if (!empty($_POST['question_title_u']) ) {
        //   $content= $_POST['question_title_u'];
        //   var_dump($content);
        //   Question::updateQuestion(3, $content);
        // }

        // if (!empty($_GET['idQuestion']) ) {
        //   echo "string";
        //   $id = $_GET['idQuestion'];
        //   var_dump($id);
        //   Question::updateQuestion($id,'on a récupéré le bon id');
        // }


if (!empty($_GET['idQuestion'])) {
    $id = $_GET['idQuestion'];
    $_SESSION['id_question_modify'] = $id;
    exit;
}

if (!empty($_SESSION['id_question_modify']) && !empty($_GET['content_modify_question'])) {
    Question::updateQuestion($_SESSION['id_question_modify'], $_GET['content_modify_question']);
    exit;
}

        if (filter_input(INPUT_POST, 'submitQCM')) {
          $qcm = new Qcm();
          $qcm->setTitle(filter_input(INPUT_POST, "qcm_title", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
          $qcm->setIdTeacher($_SESSION['id_user']);
          $qcm->setDateLimit(
            filter_input(INPUT_POST, "date_limit_qcm", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)
          );
          $qcm->buildQcm();
          $id_qcm = $cnx->pk();
          foreach ($_POST['add_question'] as $id_question) {
            $qcm_q = new LinkQuestionToQcm();
            $qcm_q->addQuestionToQCM($id_qcm, $id_question);
          }
        }

        $user = User::getUser();
        User::checkIfIsTeacher();
        ?>
        <!DOCTYPE html>
        <html lang="fr" class="h-100">
        <head>
          <?php require_once 'head.php' ?>
          <title>Tableau de bord</title>
        </head>
        <body class="h-100 bg-dark">
          <header class="d-flex container-fluid text-white " style="height:140px;padding: 20px 5vw;background-color:#153456;">
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
            <div class="align-self-end">
              <a href="disconnect.php" class="btn btn-danger" style="padding:10px 20px;">
                Se déconnecter
              </a>
            </div>
          </header>
          <main class="h-100">
            <div class="row h-100" >
              <div id="nav" class="col-3" style="background-color:#153456;">
                <?php
                if (isset($_SESSION['is_teacher'])) {
                  require('teacher/_nav1.php');
                }else{
                  require('student/_nav0.php');
                }
                ?>
              </div>
              <div id="index" class="col-9 card  ">
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
