<?php


class Comment
{

    private $conn;
    private $table = "comment_test";

    public $id;
    public $user_handle;
    public $user_id;
    public $art_id;
    public $body;
    public $create_date;


    public function __construct($db, $art)
    {
        $this->conn = $db;
        $this->art_id = $art;
    }

    public function read()
    {
        $query = 'SELECT u.handle as user_handle,
                    c.id,
                    c.user_id,
                    c.art_id,
                    c.body,
                    c.create_date
                   FROM ' . $this->table . ' c
                   LEFT JOIN
                    users_test u ON c.user_id = u.id
                    WHERE 
                    c.art_id = ' . $this->art_id . '
                    ORDER BY
                    created_at ASC';
        $stmt = $this->conn->prepare($query);

        //execute
        $stmt->execute();

        return $stmt;
    }

    public function create()
    {
        // Create query
        $query = 'INSERT INTO '
            . $this->table .
            ' SET body = :body, 
            user_id = :user_id, 
            art_id = :art_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->art_id = htmlspecialchars(strip_tags($this->art_id));

        // Bind data
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':art_id', $this->art_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }
    }
}