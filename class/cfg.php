<?php

Cfg::init();

class Cfg {

    private static $initDone = false;




    private function __construct() {
        // classe 100% statique
    }

    public static function init() {

        if (self::$initDone) {
            return false;
        }

        spl_autoload_register(function ($classe) {
            @include "class/{$classe}.php";
        });
        Connexion::setDSN('qcm_dql', 'root', '');
        // session_set_save_handler(new Session(180));
        session_start();
        return self::$initDone = true;
    }

}
