<?php


class User {
    public $id_user;
    public $login;
    public $password;
    public $nom;
    public $prenom;
    public $is_teacher;
    public $student_code;

    /**
     * User constructor.
     * @param $id_user
     * @param $login
     * @param $password
     * @param $is_teacher
     */
    public function __construct($id_user = null, $login = null, $password = null, $is_teacher = 0, $nom = null, $prenom = null, $student_code = null) {
        $this->id_user = $id_user;
        $this->login = $login;
        $this->password = $password;
        $this->is_teacher = $is_teacher;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->student_code = $student_code;
    }

    public function register() {
        $cnx = Connexion::getInstance();
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
        $req = "INSERT INTO user VALUES(DEFAULT, {$cnx->esc($this->login)}, {$password_hash}, {$cnx->esc($this->nom)}, {$cnx->esc($this->prenom)}, NULL, {$cnx->esc($this->student_code)})";
        $cnx->xeq($req);

        return true;
    }

}