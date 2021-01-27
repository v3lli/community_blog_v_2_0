<?php


class Video
{
    private $conn;
    private $table = 'video_test';

    public $id;
    public $url;
    public $description;
    public $created_at;

    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        $query = 'SELECT v.id, 
                            v.video_url, 
                            v.description,
                                FROM ' . $this->table . ' v
                                    ORDER BY
                                       p.created_at DESC
                                       LIMIT 0,3';


        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function create() {
        // Create query
        $query = 'INSERT INTO '
            . $this->table .
            ' SET video_url = :url, 
            description = :description';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->url = htmlspecialchars(strip_tags($this->url));
        $this->description = htmlspecialchars(strip_tags($this->description));

        // Bind data
        $stmt->bindParam(':url', $this->url);
        $stmt->bindParam(':description', $this->description);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

}