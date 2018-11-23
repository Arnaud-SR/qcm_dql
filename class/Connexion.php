<?php

class Connexion
{

    public static $instance;
    public static $DSN;
    public static $log;
    public static $mdp;
    public static $opt = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
    public $db;
    public $jeu;
    public $nb;

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

    // FONCTION PERMETTANT D'EXECUTER DIRECTEMENT LA REQUETE ET DETERMINE SI SELECT OU AUTRE
    public function xeq($req)
    {
        try {
            if (mb_stripos(trim($req), "SELECT") === 0) {
                $this->jeu = $this->db->query($req);
                $this->nb = $this->jeu->rowCount();
            } else {
                $this->jeu = null;
                $this->nb = $this->db->exec($req);
            }
        } catch (PDOException $e) {

            exit(" : {$req} ( {$e->getMessage()})");
        }

        return $this;
    }

    public function nb()
    {
        return $this->nb;
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

    public function prem($classe = 'stdClass')
    {
        if (!$this->jeu) {
            return null;
        }
        $this->jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $classe);

        return $this->jeu->fetch();
    }

    public function ins($obj)
    {

        if (!$this->jeu) {
            return false;
        }
        $this->jeu->setFetchMode(PDO::FETCH_INTO, $obj);

        return $this->jeu->fetch();


    }

    public function pk()
    {
        return $this->db->lastInsertId();
    }

    public function start()
    {
        $req = "START TRANSACTION";
        $this->xeq($req);
    }

    public function savepoint($label)
    {
        $req = "SAVEPOINT {$label}";
        $this->xeq($req);
    }

    public function rollback($label = null)
    {
        $req = $label ? "ROLLBACK TO {$label}" : "ROLLBACK";
        $this->xeq($req);
    }

    public function commit()
    {
        $req = "COMMIT";

        return $this->xeq($req);
    }

}
