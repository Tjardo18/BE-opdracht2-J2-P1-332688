<?php

class database
{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;
    private $dbHandler;
    private $statement;



    public function __construct()
    {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName . ";charset=UTF8";

        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass);
        } catch (PDOException $e) {
            echo "<h1>Interne Server Error, neem contact op met de Database Beheerder</h1>";
            console_log($e->getMessage());
        }
    }

    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    public function execute()
    {
        return $this->statement->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function resultSetAssoc()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
}
