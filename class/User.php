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

    public function register($asTeacher = 0) {
        $cnx = Connexion::getInstance();
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
        $req = "INSERT INTO user VALUES(DEFAULT, {$cnx->esc($this->login)}, '{$password_hash}', {$cnx->esc($this->nom)}, {$cnx->esc($this->prenom)}, $asTeacher, {$cnx->esc($this->user_code)})";
        $cnx->xeq($req);

        return true;
    }

    public function loguer() {
        $cnx = Connexion::getInstance();
        $password = $this->password;
        $req = "SELECT * FROM user WHERE login = {$cnx->esc($this->login)}";

        if ($cnx->xeq($req)->rowNb() && !$cnx->xeq($req)->ins($this)) {
            return false;
        }
        if (!password_verify($password, $this->password)) {
            return false;
        }

        if ($cnx->xeq($req)->rowNb()) {
            $_SESSION['id_user'] = $this->id_user;

            return true;
        }

        return false;
    }

    public static function checkTeacherCode($code) {
        $cnx = Connexion::getInstance();
        $req = "SELECT * FROM code_teacher WHERE code = '$code'";

        return $cnx->xeq($req)->rowNb();
    }

    public static function checkIfIsTeacher() {
        $cnx = Connexion::getInstance();
        $req = "SELECT * FROM user WHERE id_user = {$_SESSION['id_user']} AND is_teacher = 1 ";

        if ($cnx->xeq($req)->rowNb()) {
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
        $req = "SELECT * FROM user WHERE id_user={$this->id_user}";
        return (bool)Connexion::getInstance()->xeq($req)->ins($this);
    }

}
