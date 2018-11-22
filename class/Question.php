<?php

class Question {
    private $_id_question;
    private $_id_teacher;
    private $_theme;
    private $_title;

    public function __construct($id_question = null, $id_teacher = null, $theme = null, $title = null)
    {
        $this->setIdQuestion($id_question);
        $this->setIdTeacher($id_teacher);
        $this->setTheme($theme);
        $this->setTitle($title);
    }

    public function idQuestion()
    {
      return $this->_id_question;
    }

    public function setIdQuestion($id_question)
    {
      $this->_id_question = (int) $id_question;
    }

    public function idTeacher()
    {
      return $this->_id_teacher;
    }

    public function setIdTeacher($id_teacher)
    {
      $this->_id_teacher = (int) $id_teacher;
    }

    public function theme()
    {
      return $this->_theme;
    }

    public function setTheme($theme)
    {
      if (is_string($theme) && strlen($theme) <= 255) {
        $this->_theme = $theme;
      }
    }

    public function title()
    {
      return $this->_title;
    }

    public function setTitle($title)
    {
      if (is_string($title) && strlen($title) <= 255) {
        $this->_title = $title;
      }
    }

    // public function addQuestion()
    // {
    //     $cnx = Connexion::getInstance();
    //
    //     $req = "INSERT INTO questions VALUES(DEFAULT, {$_SESSION['id_user']}, {$cnx->esc($this->theme)}, {$cnx->esc($this->title)})";
    //     $cnx->xeq($req);
    //
    //     return true;
    // }
    //
    // public static function getQuestion()
    // {
    //   $question = new Question(); //on admet que le constructeur de la classe appelle chaque setter
    //   return $question->chargerQuestion();
    //
    // }
    //
    // public function chargerQuestion(int id)
    // {
    //     $req = "SELECT * FROM questions WHERE id_question={$this->id_question}";
    //     return (bool)Connexion::getInstance()->xeq($req)->ins($this);
    // }
}
