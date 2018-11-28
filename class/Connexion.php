<?php

class Connexion
{

    private static $instance;
    private static $DSN;
    private static $log;
    private static $mdp;
    private static $opt = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
    private $db;
    private $jeu;
    private $rowNb;

    private function __construct()
    {
        if (!self::$DSN) {
            exit();
        }
        try {
            $this->db = new PDO(self::$DSN, self::$log, self::$mdp, self::$opt);
        } catch (PDOException $e) {
            exit(" : {$e->getMessage()}");
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Connexion();
        }

        return self::$instance;
    }

    public static function setDSN($dbName, $log, $mdp, $host = 'localhost')
    {
        if (self::$DSN) {
            exit();
        }
        self::$DSN = "mysql:dbname={$dbName};host={$host}; charset=utf8mb4";
        self::$log = $log;
        self::$mdp = $mdp;
    }

    public function esc($val)
    {
        if ($val === null) {
            return 'NULL';
        }

        return $this->db->quote($val);
    }

    public function prepareAndExecute($reqStr, $array)
    {
        try {
            $this->jeu = $req = $this->db->prepare($reqStr);
            $req->execute($array);
        } catch (PDOException $e) {

            exit(" : {$reqStr} ( {$e->getMessage()})");
        }

        return $this;
    }

    public function rowNb()
    {
        return $this->rowNb;
    }

// RETOURNE UN ARRAY RELATIF A LA REQUETE
    public function tab($classe = 'stdClass')
    {
        if (!$this->jeu) {
            return [];
        }
        $this->jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $classe);

        return $this->jeu->fetchAll();
    }
// retourne la première ligne du jeu retourné
    public function prem($classe = 'stdClass')
    {
        if (!$this->jeu) {
            return null;
        }
        $this->jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $classe);

        return $this->jeu->fetch();
    }
//insère les données reçu dans une variable
    public function ins($obj)
    {

        if (!$this->jeu) {
            return false;
        }
        $this->jeu->setFetchMode(PDO::FETCH_INTO, $obj);

        return $this->jeu->fetch();


    }
//retourne la dernière clé inséré en bdd
    public function pk()
    {
        return $this->db->lastInsertId();
    }
}

