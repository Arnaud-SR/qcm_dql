<?php
require_once("class/cfg.php");

if (!isset($_SESSION['id_user'])) {
  header("Location: index.php");
  exit;
}
$qcmNoPublished = QCM::getQcmList();
$qcmPublished = QCM::getQcmList(1);


//création d'une nouvelle question et des réponses qui lui sont associées
$tabError = [];
$cnx = Connexion::getInstance();
if (filter_input(INPUT_POST, "submitQuestion")) {
  $question = new Question();

  $question->setTitle(filter_input(INPUT_POST, "question_title", FILTER_SANITIZE_STRING, FILTER_SANITIZE_MAGIC_QUOTES));
  $question->setIdTeacher($_SESSION['id_user']);
  $question->setTheme(filter_input(INPUT_POST, "select_theme", FILTER_SANITIZE_STRING, FILTER_SANITIZE_MAGIC_QUOTES));

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
          FILTER_SANITIZE_MAGIC_QUOTES
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
            FILTER_SANITIZE_MAGIC_QUOTES
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
              FILTER_SANITIZE_MAGIC_QUOTES
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
                FILTER_SANITIZE_MAGIC_QUOTES
                )
              );
              $responseD->addResponse($id_question, isset($_POST['d_is_correct']) ? 1 : 0);
            }

            header('Location: dashboard.php');
            exit();
          }

        }


        //modification d'une question
        //récupération de l'id d'une question et d'une variable de session contenant cet id
        if (!empty($_GET['idQuestion'])) {
          $id = $_GET['idQuestion'];
          $_SESSION['id_question_modify'] = $id;
          exit;
        }
        //insertion du nouveau titre de la question dans la base de données
        if (!empty($_SESSION['id_question_modify']) && !empty($_GET['content_modify_question'])) {
          Question::updateQuestion($_SESSION['id_question_modify'], $_GET['content_modify_question']);
          exit;
        }

        // //réception requête ajax get qui contient tableau json
        // //decodage de json vers php  = tableauReponsephp
        // //variable de session contenant le tableauReponsephp
        if (!empty($_GET['json_response_Array'])) {
          $response_array = json_decode($_GET['json_response_Array'], true);
          var_dump($response_array);
          $_SESSION['response_Array'] = $response_array;
          exit;
        }

        // //insertion des nouvelles réponses dans la base de données
        if (!empty($_SESSION['response_Array'])) {
          for ($i=0; $i < 4; $i++) {
          Response::updateResponse($_SESSION['response_Array'][i]->id_response,
                                   $_SESSION['response_Array'][i]->response ,
                                   $_SESSION['response_Array'][i]->is_correct);
          }
          exit;
        }




        //construction d'un qcm
        if (filter_input(INPUT_POST, 'submitQCM')) {
          $qcm = new Qcm();
          $qcm->setTitle(filter_input(INPUT_POST, "qcm_title", FILTER_SANITIZE_STRING, FILTER_SANITIZE_MAGIC_QUOTES));
          $qcm->setIdTeacher($_SESSION['id_user']);
          $qcm->setDateLimit(
            filter_input(INPUT_POST, "date_limit_qcm", FILTER_SANITIZE_STRING, FILTER_SANITIZE_MAGIC_QUOTES)
          );
          $qcm->setUuidQcm(bin2hex(random_bytes(10)));
          $qcm->buildQcm();
          $id_qcm = $cnx->pk();
          foreach ($_POST['add_question'] as $id_question) {
            $qcm_q = new compose();
            $qcm_q->addQuestionToQCM($id_qcm, $id_question);
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
        <body style="background-color:#153456;">
          <header class="d-flex container-fluid text-white " style="height:140px;padding: 20px 5vw;background-color:#153456;">
            <h1> Gestionnaire de QCM
              <?php
              if (isset($_SESSION['is_teacher'])) {
                echo "pour l'enseignant ".$user->prenom." ".$user->nom;
              }else{
                echo "pour l'étudiant ".$user->prenom." ".$user->nom;
              }
              ?>
            </h1>
            <div class="align-self-end">
              <a href="disconnect.php" class="btn btn-danger" style="padding:10px 20px;">
                Se déconnecter
              </a>
            </div>
          </header>
          <main >
            <div class="row " >
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
