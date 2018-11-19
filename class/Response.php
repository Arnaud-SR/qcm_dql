<?php


class Answers {
    private $id_response;
    private $id_question;
    private $content;
    private $is_correct;

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

    public function addResponses(){

    }


}