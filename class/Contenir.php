<?php


class Contenir
{
    private $id_qcm;
    private $id_question;

    public function __construct($id_qcm = null, $id_question = null)
    {
        $this->id_qcm = $id_qcm;
        $this->id_question = $id_question;
    }

    public function addQuestionToQcm($id_qcm, $id_question)
    {
        $cnx = Connexion::getInstance();

        $req = "INSERT INTO contenir VALUES(:id_qcm, :id_question)";
        $cnx->prepareAndExecute(
            $req,
            [
                'id_qcm' => $id_qcm,
                'id_question' => $id_question,
            ]
        );


    }
}
