<?php
/**
 * Created by PhpStorm.
 * User: Arnaud
 * Date: 12/10/2018
 * Time: 16:42
 */

class Questions {
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
        $req = "INSERT INTO questions VALUES(DEFAULT, {$ncx->esc($this->theme)},DEFAULT, {$ncx->esc($this->title)},{$ncx->esc($this->$choices['A'])},{$ncx->esc($this->$choices['B'])},{$ncx->esc($this->$choices['C'])},{$ncx->esc($this->$choices['D'])},'{$right_answers}')";
        $cnx->xeq($req);

        return true;
    }

    public function get_right_answers($answers){
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
