<?php

class Post
{
    private $conn;
    private $table = 'posts_test';

    public $id;
    public $cat_id;
    public $cat_name;
    public $author;
    public $title;
    public $body;
    public $subtitle;
    public $description;
    public $thumbnail;
    public $spread;
    public $pc;
    public $isvideo;
    public $created_at;

    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        $query = 'SELECT c.name as cat_name, 
                                p.id, 
                                p.cat_id, 
                                p.author, 
                                p.title, 
                                p.body, 
                                p.subtitle, 
                                p.description, 
                                p.thumbnail, 
                                p.spread,
                                p.pc,
                                p.isvideo, 
                                p.created_at
                                FROM ' . $this->table . ' p
                                LEFT JOIN
                                    category_test c ON p.cat_id = c.id
                                    ORDER BY
                                       p.created_at DESC';


        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


    public function read_single(){
        $query = 'SELECT c.name as cat_name, 
                                p.id, 
                                p.cat_id, 
                                p.author, 
                                p.title, 
                                p.body, 
                                p.subtitle, 
                                p.description, 
                                p.thumbnail, 
                                p.spread, 
                                p.pc,
                                p.isvideo,
                                p.created_at
                                FROM ' . $this->table . ' p
                                LEFT JOIN
                                    category_test c ON p.cat_id = c.id
                                WHERE
                                    p.id = ?
                                LIMIT 0,1';

        $stmt = $this->conn->prepare($query);

        //bind
        $stmt->bindParam(1,$this->id);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //set props

        $this->cat_id = $row['cat_id'];
        $this->cat_name = $row['cat_name'];
        $this->author = $row['author'];
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->subtitle = $row['subtitle'];
        $this->description = $row['description'];
        $this->thumbnail = $row['thumbnail'];
        $this->spread = $row['spread'];
        $this->pc = $row['pc'];
        $this->isvideo = $row['isvideo'];
        $this->created_at = $row['created_at'];

    }

    public function create() {
        // Create query
        $query = 'INSERT INTO '
            . $this->table .
            ' SET title = :title, 
            body = :body, 
            author = :author, 
            cat_id = :cat_id, 
            subtitle = :subtitle, 
            description = :description, 
            thumbnail = :thumbnail, 
            spread = :spread,
            pc = :pc,
            isvideo = :isvideo';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->subtitle = htmlspecialchars(strip_tags($this->subtitle));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->thumbnail = htmlspecialchars(strip_tags($this->thumbnail));
        $this->spread = htmlspecialchars(strip_tags($this->spread));
        $this->cat_id = htmlspecialchars(strip_tags($this->cat_id));

        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':cat_id', $this->cat_id);
        $stmt->bindParam(':subtitle', $this->subtitle);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':thumbnail', $this->thumbnail);
        $stmt->bindParam(':spread', $this->spread);
        $stmt->bindParam(':pc', $this->pc);
        $stmt->bindParam(':isvideo', $this->isvideo);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }







}