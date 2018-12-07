<?php

class Qcm {
    public $id_qcm;
    public $title;
    public $id_teacher;
    public $created_at;
    public $date_limite;
    public $is_published;

    /**
     * Qcm constructor.
     * @param $id_qcm
     * @param $id_teacher
     * @param $created_at
     * @param $date_limite
     * @param $is_published
     * @throws Exception
     */
    public function __construct($id_qcm = null, $title = null, $id_teacher = null, $created_at = null, $date_limite = null, $is_published = null)
    {
        $this->id_qcm = $id_qcm;
        $this->title = $title;
        $this->id_teacher = $id_teacher;
        $this->created_at = new DateTime('now');
        $this->date_limite = $date_limite;
        $this->is_published = $is_published;
    }

    public function buildQcm(){
        $cnx = Connexion::getInstance();

        $req = "INSERT INTO qcm VALUES()";
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
    public function getIdTeacher()
    {
        return $this->id_teacher;
    }

    /**
     * @param null $id_teacher
     */
    public function setIdTeacher($id_teacher): void
    {
        $this->id_teacher = $id_teacher;
    }

    /**
     * @return null
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param null $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return null
     */
    public function getDateLimite()
    {
        return $this->date_limite;
    }

    /**
     * @param null $date_limite
     */
    public function setDateLimite($date_limite): void
    {
        $this->date_limite = $date_limite;
    }

    /**
     * @return null
     */
    public function getisPublished()
    {
        return $this->is_published;
    }

    /**
     * @param null $is_published
     */
    public function setIsPublished($is_published): void
    {
        $this->is_published = $is_published;
    }




}