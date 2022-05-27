<?php
class Database
{
    public $host = getenv("DB_HOST");//"communityblog-server.mysql.database.azure.com:3306";
    public $db_name = getenv("DB_DATABASE");// "rviii";
    public $username = getenv("DB_USERNAME"); //"trfnqkctdj";
    public $password = getenv("DB_PASSWORD");//"6MD5C8YDF8PLBW3V$";
    public $conn;

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
