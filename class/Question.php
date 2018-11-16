<?php

class Question {
    public $id_question;
    public $id_teacher;
    public $theme;
    public $title;
    public $choices;
    public $teacher_answers;

    public  function __construct($id_question = null, $id_teacher = null, $theme = null, $title = null, $choices = null, $teacher_answers = null) {
        $this->id_question = $id_question;
        $this->id_teacher = $id_teacher;
        $this->theme  = $theme ;
        $this->title  = $title ;
        $this->choices = $choices;
        $this->teacher_answers = $teacher_answers;

    }

    public function put(){
        $cnx = Connexion::getInstance();
        $right_answers = get_right_answers($this->teacher_answers);
        $req = "INSERT INTO questions VALUES(DEFAULT, {$cnx->esc($this->theme)},DEFAULT, {$cnx->esc($this->title)},{$cnx->esc($this->choices['A'])},{$cnx->esc($this->choices['B'])},{$cnx->esc($this->choices['C'])},{$cnx->esc($this->choices['D'])},'{$right_answers}')";
        $cnx->xeq($req);

        return true;
    }

    public function loadQuestion() {
        $req = "SELECT theme FROM questions WHERE id_question={$this->id_question}";
        return (bool)Connexion::getInstance()->xeq($req)->ins($this);
    }


    private function get_right_answers($answers){
        $solution = "";
        foreach ($answers as $key => $value)
        {
            if($value){
                $solution = $solution.$key;
            }
        }
        return $solution;
    }
}
