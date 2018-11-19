<?php


class Response {
    public $id_response;
    public $id_question;
    public $content;
    public $is_correct;

    /**
     * Answers constructor.
     * @param $id_answer
     * @param $id_question
     * @param $content
     * @param $is_correct
     */
    public function __construct($id_response = null, $id_question = null, $content = null, $is_correct = null)
    {
        $this->id_response = $id_response;
        $this->id_question = $id_question;
        $this->content = $content;
        $this->is_correct = $is_correct;
    }

    public function addResponse($id_question)
    {
        $cnx = Connexion::getInstance();

        $req = "INSERT INTO response VALUES(DEFAULT, {$id_question}, {$cnx->esc($this->content)}, false)";
        $cnx->xeq($req);
    }

    public static function setIsCorrect($id_question, $id_response)
    {
        $cnx = Connexion::getInstance();

        $req = "UPDATE response SET is_correct = true WHERE id_question = {$id_question} AND id_response = {$id_response}";
        $cnx->xeq($req);
    }


}