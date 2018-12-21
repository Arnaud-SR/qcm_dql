<?php


class Results {
    private $id_result;
    private $id_qcm;
    private $id_student;
    private $result;
    private $is_publicated;

    /**
     * Results constructor.
     * @param $id_result
     * @param $id_qcm
     * @param $id_student
     * @param $result
     * @param $is_publicated
     */
    public function __construct(
        $id_result = null,
        $id_qcm = null,
        $id_student = null,
        $result = null,
        $is_publicated = 0
    ) {
        $this->id_result = $id_result;
        $this->id_qcm = $id_qcm;
        $this->id_student = $id_student;
        $this->result = $result;
        $this->is_publicated = $is_publicated;
    }

    public function addResult()
    {
        $cnx = Connexion::getInstance();

        $req = "INSERT INTO results VALUES(DEFAULT, :id_qcm, :id_student, :result, 0)";
        $cnx->prepareAndExecute(
            $req,
            [
                'id_qcm' => $this->getIdQcm(),
                'id_student' => $this->getIdStudent(),
                'result' => $this->getResult(),
            ]
        );
    }

    public static function isAlreadySubmittedByStudent($id_qcm)
    {
        $cnx = Connexion::getInstance();
        $req = "SELECT * FROM results WHERE id_qcm = :id_qcm AND id_student = :id_student";

        $result = $cnx->prepareAndExecute($req, [
            'id_qcm' => $id_qcm,
            'id_student' => $_SESSION['id_user']
        ]);

        return $result->rowNb() > 0;
    }

    /**
     * @return null
     */
    public function getIdResult()
    {
        return $this->id_result;
    }

    /**
     * @param null $id_result
     */
    public function setIdResult($id_result): void
    {
        $this->id_result = $id_result;
    }

    /**
     * @return null
     */
    public function getIdQcm()
    {
        return $this->id_qcm;
    }

    /**
     * @param null $id_qcm
     */
    public function setIdQcm($id_qcm): void
    {
        $this->id_qcm = $id_qcm;
    }

    /**
     * @return null
     */
    public function getIdStudent()
    {
        return $this->id_student;
    }

    /**
     * @param null $id_student
     */
    public function setIdStudent($id_student): void
    {
        $this->id_student = $id_student;
    }

    /**
     * @return null
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param null $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }

    /**
     * @return null
     */
    public function getisPublicated()
    {
        return $this->is_publicated;
    }

    /**
     * @param null $is_publicated
     */
    public function setIsPublicated($is_publicated): void
    {
        $this->is_publicated = $is_publicated;
    }




}