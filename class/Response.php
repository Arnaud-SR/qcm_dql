<?php


class Response {
    private $id_response;
    private $id_question;
    private $content;
    private $is_correct;

    /**
     * Response constructor.
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

    public function addResponse($id_question, $is_correct)
    {
        $cnx = Connexion::getInstance();

        $req = "INSERT INTO response VALUES(DEFAULT, :id_question, :content , :is_correct )";
        $cnx->prepareAndExecute($req, [
            'id_question' => $id_question,
            'content' => $this->getContent(),
            'is_correct' => $is_correct
        ]);
    }

    public static function updateResponse($id_response, $responseTitle ,$is_correct)
    {
        $cnx = Connexion::getInstance();

        $query = "UPDATE response SET response = :responseTitle, is_correct = :is_correct WHERE id_response = :id_response";
        $cnx->prepareAndExecute($query,array(
            'responseTitle' => $responseTitle,
            'id_response' => $id_response,
            'is_correct' => $is_correct
          ));
    }

    /**
     * @return null
     */
    public function getIdResponse()
    {
        return $this->id_response;
    }

    /**
     * @param null $id_response
     */
    public function setIdResponse($id_response): void
    {
        $this->id_response = $id_response;
    }

    /**
     * @return null
     */
    public function getIdQuestion()
    {
        return $this->id_question;
    }

    /**
     * @param null $id_question
     */
    public function setIdQuestion($id_question): void
    {
        $this->id_question = $id_question;
    }

    /**
     * @return null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param null $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return null
     */
    public function getisCorrect()
    {
        return $this->is_correct;
    }

    /**
     * @param null $is_correct
     */
    public function setIsCorrect($is_correct): void
    {
        $this->is_correct = $is_correct;
    }
}
