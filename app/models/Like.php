<?php
class Like
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLikes($post_id)
    {
        $this->db->query('SELECT
                        likes.post_id,
                        likes.user_id
                        FROM likes
                        WHERE post_id = :post_id
                        ');
        $this->db->bind(':post_id', $post_id);

        $results = $this->db->resultSet();
        return $results;
    }

    public function addLike($data)
    {
        $this->db->query('INSERT INTO likes (post_id, user_id) VALUES(:post_id, :user_id)');
        // Bind values
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':user_id', $data['user_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hasLike($data)
    {
        $this->db->query('SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id');
        // Bind value
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':user_id', $data['user_id']);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteLike($data)
    {
        $this->db->query('DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id');
        // Bind value
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':user_id', $data['user_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
