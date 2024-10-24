<<?php

    class posts 

{
    private $conn;
    public function __construct($conn) 
    {
        $this->conn = $conn;
    }
    public function getBlogPosts() 
    {
        $query = "SELECT posts.id, posts.title, posts.content, users.username, users.id, posts.image
FROM posts 
INNER JOIN users ON posts.id = users.id";
        $result = $this->conn->query($query);
        $posts = $result->fetch_all(MYSQLI_ASSOC);
        return $posts;
    }

    public function getBlogPostById($postId) 
    {
        $query = "SELECT posts.id, posts.title, posts.content,users.username, users.id, post.image
FROM posts 
INNER JOIN users ON posts.id = user.id 
WHERE posts.id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        $post = $result->fetch_assoc();
        return $post;
    }
}
?>