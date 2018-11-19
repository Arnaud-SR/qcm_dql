<?php

class Question {
    public $id_question;
    public $id_teacher;
    public $theme;
    public $title;

    public function __construct($id_question = null, $id_teacher = null, $theme = null, $title = null)
    {
        $this->id_question = $id_question;
        $this->id_teacher = $id_teacher;
        $this->theme = $theme;
        $this->title = $title;
    }

    public function addQuestion()
    {
        $cnx = Connexion::getInstance();

        $req = "INSERT INTO questions VALUES(DEFAULT, {$_SESSION['id_user']}, {$cnx->esc($this->theme)}, {$cnx->esc($this->title)})";
        $cnx->xeq($req);

        return true;
    }
}
