<?php
class Database
{
    private $host = 'interhost.mysql.database.azure.com:3306';
    private $db_name = 'rviii';
    private $username = 'rootadmin';
    private $password = 'Rviiir00t';
    private $conn;

    //connect to database
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}