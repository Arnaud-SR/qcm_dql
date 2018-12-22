<?php

class Qcm {
    private $id_qcm;
    private $title;
    private $id_teacher;
    private $created_at;
    private $date_limit;
    private $is_published;
    private $uuid_qcm;

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
        $is_published = null,
        $uuid_qcm = null
    )
    {
        $this->id_qcm = $id_qcm;
        $this->title = $title;
        $this->id_teacher = $id_teacher;
        $this->created_at = $created_at;
        $this->date_limit = $date_limit;
        $this->is_published = $is_published;
        $this->uuid_qcm = $uuid_qcm;
    }

    public function buildQcm()
    {
        $cnx = Connexion::getInstance();
        $createdAt = new DateTime('now');
        $date = $createdAt->format('Y-m-d H:i:s');
        $req = "INSERT INTO qcm VALUES(:id_qcm, :id_teacher, :title, :createdAt, :dateLimit, :is_published, :uuid_qcm)";

        $cnx->prepareAndExecute(
            $req,
            [
                'id_qcm' => $this->id_qcm,
                'id_teacher' => $_SESSION['id_user'],
                'title' => $this->title,
                'createdAt' => $date,
                'dateLimit' => $this->date_limit,
                'is_published' => 0,
                'uuid_qcm' => $this->uuid_qcm,
            ]
        );
    }

    public function checkDateLimit()
    {
      $today = new DateTime('now');
      $formattedTodayDate = $today->format('Y-m-d H:i:s');
      $limitDate = $this->date_limit;
      if ($formattedTodayDate < $limitDate) {
        echo "<a class='btn btn-primary border border-primary btn-sm ' href='qcm-exam.php?uuid_qcm={$this->uuid_qcm}&id_qcm={$this->id_qcm}'>Commencer</a>";
      }else {
        echo "Désolé, la date limite est dépassée!";
      }
    }

    public static function getQcmList($is_published = 0)
    {
        $cnx = Connexion::getInstance();
        $req = "SELECT * FROM qcm WHERE is_published = :is_published";

        $result = $cnx->prepareAndExecute(
            $req,
            [
                'is_published' => $is_published,
            ]
        );

        return $result->tab(Qcm::class);
    }

    public static function getQcmFinished()
    {
        $cnx = Connexion::getInstance();

        $req = "SELECT * FROM qcm INNER JOIN results ON results.id_qcm = qcm.id_qcm WHERE results.id_student = :id_student";

        $result = $cnx->prepareAndExecute(
            $req,
            [
                'id_student' => $_SESSION['id_user'],
            ]
        );

        return $result->tab();
    }

    public static function getQuestionsByQcmuuid($uuid_qcm)
    {
        $cnx = Connexion::getInstance();
        $req = "SELECT DISTINCT questions.* FROM questions INNER JOIN contenir ON contenir.id_question = questions.id_question INNER JOIN qcm ON contenir.id_qcm = qcm.id_qcm INNER JOIN response ON response.id_question = questions.id_question WHERE qcm.uuid_qcm = :uuid_qcm";

        $result = $cnx->prepareAndExecute(
            $req,
            [
                'uuid_qcm' => $uuid_qcm,
            ]
        );

        return $result->tab(Question::class);
    }

    public static function checkIfQcmExist($uuid_qcm, $id_qcm)
    {
        $cnx = Connexion::getInstance();
        $req = "SELECT * FROM qcm WHERE uuid_qcm = :uuid_qcm AND id_qcm = :id_qcm";

        $result = $cnx->prepareAndExecute($req, [
            'uuid_qcm' => $uuid_qcm,
            'id_qcm' => $id_qcm
        ]);

        return $result->rowNb() >= 1;
    }

    public static function getAllQcm()
    {
        $cnx = Connexion::getInstance();
        $req = "SELECT * FROM qcm";

        $result = $cnx->prepareAndExecute(
            $req
        );

        return $result->tab(Qcm::class);
    }

    public static function getTeacherName($id_teacher)
    {
        $cnx = Connexion::getInstance();

        $req = "SELECT prenom, nom FROM user WHERE id_user = :id_teacher";

        $result = $cnx->prepareAndExecute($req, ['id_teacher' => $id_teacher])->tab();

        return $result;
    }

    public static function getAllStudentResultsForOneQCM($id_qcm)
    {
        $cnx = Connexion::getInstance();

        $req = "SELECT user.nom, user.prenom, result, id_result, is_publicated FROM user, results WHERE user.id_user = results.id_student AND id_qcm = :id_qcm";

        $studentsResults = $cnx->prepareAndExecute($req, [
          'id_qcm' => $id_qcm
          ])->tab();

          $row=0;
          $res = "";
          foreach ($studentsResults as $student) {
            $lastName = $student->nom;
            $firstName = $student->prenom;
            $mark = $student->result;
            $id_result = $student->id_result;
            $is_publicated = !$student->is_publicated ? "<td><a href='publicate-result.php?id_result={$id_result}' class='btn btn-warning'>Publier la note</a></td>" : "<td><span class='btn btn-info'>Resultat publié</span></td>";
              $res = $res."<td scope='row'>".$row."</td><td>".$lastName."</td><td>".$firstName."</td><td>".$mark."</td>".$is_publicated;
            $row++;
          }


        return $res;
    }

    public static function getStudentResultInfoForOneQcm($id_qcm)
    {
        $cnx = Connexion::getInstance();

        $req = "SELECT";
    }



    public static function getAllResults($id_qcm)
    {
        $cnx = Connexion::getInstance();
        $req = "SELECT * FROM results WHERE id_qcm = :id_qcm";

        $result = $cnx->prepareAndExecute($req, [
            'id_qcm' => $id_qcm,
        ]);

        return $result->tab();
    }

    public static function countNbQuestions($id_qcm)
    {
        $cnx = Connexion::getInstance();
        $req = "SELECT * FROM contenir WHERE id_qcm = :id_qcm";

        $result = $cnx->prepareAndExecute(
            $req,
            [
                'id_qcm' => $id_qcm,
            ]
        );

        return $result->rowNb();
    }

    public static function publishedQcm($id_qcm)
    {
        $cnx = Connexion::getInstance();
        $req = "UPDATE qcm SET is_published = 1 WHERE id_qcm = :id_qcm";

        $cnx->prepareAndExecute($req, [
            'id_qcm' => $id_qcm
        ]);

        return true;
    }



    public function getQuestions()
    {
        $cnx = Connexion::getInstance();

        $req = "SELECT response.* FROM questions INNER JOIN contenir ON questions.id_question = contenir.id_question INNER JOIN response ON response.id_question = questions.id_question WHERE contenir.id_qcm = :id_qcm";
        $req2 = "SELECT * FROM questions INNER JOIN contenir ON questions.id_question = contenir.id_question WHERE contenir.id_qcm = :id_qcm";


        return [
            'responses' => $cnx->prepareAndExecute(
                $req,
                [
                    'id_qcm' => $this->id_qcm,
                ]
            )->tab(),
            'questions' => $cnx->prepareAndExecute(
                $req2,
                [
                    'id_qcm' => $this->id_qcm,
                ]
            )->tab(),
        ];
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

    /**
     * @return null
     */
    public function getUuidQcm()
    {
        return $this->uuid_qcm;
    }

    /**
     * @param null $uuid_qcm
     */
    public function setUuidQcm($uuid_qcm): void
    {
        $this->uuid_qcm = $uuid_qcm;
    }


}
