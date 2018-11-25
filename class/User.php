<?php


class User {
    public $id_user;
    public $login;
    public $password;
    public $nom;
    public $prenom;
    public $is_teacher;
    public $user_code;

    /**
     * User constructor.
     * @param $id_user
     * @param $login
     * @param $password
     * @param $is_teacher
     */
    public function __construct($id_user = null, $login = null, $password = null, $is_teacher = 0, $nom = null, $prenom = null, $user_code = null) {
        $this->id_user = $id_user;
        $this->login = $login;
        $this->password = $password;
        $this->is_teacher = $is_teacher;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->user_code = $user_code;
    }

    public function register($is_teacher = 0)
    {
        $cnx = Connexion::getInstance();
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user VALUES(DEFAULT, :login, :password_hash, :nom, :prenom, :is_teacher, :user_code)";
        $cnx->prepareAndExecute(
            $query,
            [
                'login' => $this->login,
                'password_hash' => $password_hash,
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'is_teacher' => 0,
                'user_code' => $this->user_code,
            ]
        );

        return true;
    }

    public function loguer() {
        $cnx = Connexion::getInstance();
        $password = $this->password;
        $query = "SELECT * FROM user WHERE login = :login";

        if ($cnx->prepareAndExecute(
                $query,
                [
                    'login' => $this->login,
                ]
            )->rowNb() && !$cnx->prepareAndExecute(
                $query,
                [
                    'login' => $this->login,
                ]
            )->ins($this)) {
            return false;
        }
        if (!password_verify($password, $this->password)) {
            return false;
        }

        if ($cnx->prepareAndExecute(
            $query,
            [
                'login' => $this->login,
            ]
        )->rowNb()) {
            $_SESSION['id_user'] = $this->id_user;

            return true;
        }

        return false;
    }

    public static function checkTeacherCode($code) {
        $cnx = Connexion::getInstance();
        $query = "SELECT * FROM code_teacher WHERE code = :code";

        return $cnx->prepareAndExecute(
            $query,
            [
                'login' => $code,
            ]
        )->rowNb();
    }

    public static function checkIfIsTeacher() {
        $cnx = Connexion::getInstance();
        $query = "SELECT * FROM user WHERE id_user = :id_user AND is_teacher = 1 ";

        if ($cnx->prepareAndExecute(
            $query,
            [
                'id_user' => $_SESSION['id_user'],
            ]
        )->rowNb()) {
            $_SESSION['is_teacher'] = true;
        }
    }

    public static function getUser() {
        if (isset($_SESSION['id_user'])) {
            $user = new User();
            $user->id_user = $_SESSION['id_user'] ?? null;
            return $user->chargerUser() ? $user : null;
        }
    }

    private function chargerUser() {
        if (!$this->id_user) {
            return false;
        }
        $query = "SELECT * FROM user WHERE id_user = :id_user";

        return (bool)Connexion::getInstance()->prepareAndExecute(
            $query,
            [
                'id_user' => $this->id_user,
            ]
        )->ins($this);
    }

}
