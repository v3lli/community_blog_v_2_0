<?php
class User{

    private $table = 'users_test';
    private $conn;

    public $id;
    public $first_name;
    public $last_name;
    public $mobile;
    public $gender;
    public $email;
    public $handle;
    public $password;
    public $isadmin;
    public $created_at;

    public function __construct($db){
        $this->conn = $db;
    }

    function create(){
        $query = 'INSERT INTO ' . $this->table . ' SET email = :email, handle = :handle, password = :password';

        $stmt = $this->prep_clean($query);

        // Bind data
        $stmt->bindParam(':handle', $this->handle);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        // Execute query
        if($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    function update_user(){
        $query = 'UPDATE ' . $this->table . ' SET first_name = :first_name, last_name = :last_name, gender = :gender, mobile = :mobile, email = :email';
//        prepare via custom helper function
        $stmt = $this->prep_clean($query);
        //run via custom helper function
        $this->run($stmt);
    }

    function prep_clean($ask){
        $stm = $this->conn->prepare($ask);

        // Clean data
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->mobile = htmlspecialchars(strip_tags($this->mobile));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->handle = htmlspecialchars(strip_tags($this->handle));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        return $stm;

    }

    function run($stm){

        if($stm->execute()){
            return true;
        }
        printf("Error %s.\n", $stm->error);
        return false;
    }

    public function read() {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' u';

        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Execute query
        $stmt->execute();
        return $stmt;
    }

    function if_email_exists(){
        $query = 'SELECT u.first_name, 
                        u.id,
                        u.last_name, 
                        u.mobile, 
                        u.gender, 
                        u.isadmin, 
                        u.created_at, 
                        u.password, 
                        u.handle 
                        FROM 
                        ' . $this->table . ' 
                        u WHERE 
                        u.email = 
                        "'.$this->email.'" 
                        LIMIT 0,1';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($this->password == $row['password'])
        {
            $this->id = $row['id'];
            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->email = $row['email'];
            $this->handle = $row['handle'];
            $this->isadmin = $row['isadmin'];
            $this->mobile = $row['mobile'];
            $this->last_name = $row['gender'];
            return true;
        }
        else{
            return false;
        }
    }

//    function get_user_byID(){
//    }
//
//    function login(){
//    }
//
//    function logout(){
//    }


}
