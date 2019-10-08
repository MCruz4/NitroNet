<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;

    public function __construct(){
        $db_cfg = require 'config/db_config.php';
        $this->driver = $db_cfg["driver"];
        $this->host = $db_cfg["host"];
        $this->db = $db_cfg["db"];
        $this->user = $db_cfg["user"];
        $this->pass = $db_cfg["pass"];
        $this->charset = $db_cfg["charset"];
    }

    function connect(){
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new PDO($dsn, $this->user, $this->pass, $options);
            return $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}