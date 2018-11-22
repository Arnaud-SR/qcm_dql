<?php /**
 *
 */
class Manager
{
  private $_cnx;

  public function __construct()
  {
    $this->_cnx = Connexion::getInstance();
  }

  public function addQuestion(Question $question)
  {
    $req = "INSERT INTO questions VALUES(DEFAULT, {$_SESSION['id_user']}, {$_cnx->esc($question->theme())}, {$_cnx->esc($question->title())})";
    $_cnx->xeq($req);
    return true;
  }

}
 ?>
