<?php


class DB {

    private $dsn = 'mysql:host=127.0.0.1;dbname=cricket'; //mysql.hostinger.in
    private $username = 'root'; // u553716585_jawad
    private $password = ''; // realanalysis
    // u553716585_crick
    private $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    private $PDO;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->PDO = new PDO($this->dsn, $this->username, $this->password, $this->options);
    }

    public function query($qry) {
        //echo $qry;
        return $this->PDO->query($qry); //->fetchAll(PDO::FETCH_ASSOC);
        //return $this->PDO->lastInsertId();
    }

    public function queryIns($qry) {
        $this->PDO->query($qry);
        return $this->PDO->lastInsertId();
    }

}