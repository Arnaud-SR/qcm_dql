<?php

class Qcm {
    public $id_qcm;
    public $title;
    public $id_teacher;
    public $created_at;
    public $date_limit;
    public $is_published;

    /**
     * Qcm constructor.
     * @param $id_qcm
     * @param $id_teacher
     * @param $created_at
     * @param $date_limite
     * @param $is_published
     *
     */
    public function __construct(
        $id_qcm = null,
        $title = null,
        $id_teacher = null,
        $created_at = null,
        $date_limit = null,
        $is_published = null
    )
    {
        $this->id_qcm = $id_qcm;
        $this->title = $title;
        $this->id_teacher = $id_teacher;
        $this->created_at = $created_at;
        $this->date_limit = $date_limit;
        $this->is_published = $is_published;
    }

    public function buildQcm()
    {
        $cnx = Connexion::getInstance();
        $createdAt = new DateTime('now');
        $date = $createdAt->format('Y-m-d H:i:s');
        $req = "INSERT INTO qcm VALUES(:id_qcm, :id_teacher, :title, :createdAt, :dateLimit, :is_published )";

        $cnx->prepareAndExecute(
            $req,
            [
                'id_qcm' => $this->id_qcm,
                'id_teacher' => $_SESSION['id_user'],
                'title' => $this->title,
                'createdAt' => $date,
                'dateLimit' => $this->date_limit,
                'is_published' => 0,
            ]
        );
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

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return null
     */
    public function getDateLimit()
    {
        return $this->date_limit;
    }

    /**
     * @param null $date_limit
     */
    public function setDateLimit($date_limit): void
    {
        $this->date_limit = $date_limit;
    }
}