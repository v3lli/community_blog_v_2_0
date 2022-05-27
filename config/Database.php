<?php 
class Database
{
    private $host = $_ENV["APPSETTING_DB_HOST"]//"communityblog-server.mysql.database.azure.com";
    private $db_name = $_ENV["APPSETTING_DB_DATABASE"] //"rviii";
    private $username = $_ENV["APPSETTING_DB_USERNAME"] //"trfnqkctdj@communityblog-server.mysql.database.azure.com";
    private $password = $_ENV["APPSETTING_DB_PASSWORD"] //"6MD5C8YDF8PLBW3V$";
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
