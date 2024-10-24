<?php
require "includes/db_conn.php";
require "includes/blogpost.php";
$objBlogPost = new posts($conn);
$arrPosts = $objBlogPost->getBlogPosts();
?>
<div id="main">
    <h1>My Simple Blog</h1>
    <div id="blogPosts">
        <?php
            if (count($arrPosts)) {
                foreach ($arrPosts as $post) {
                    echo "<div class='post'>";
                    echo "<h1>" . $post['title'] . "</h1>";
                    echo "<p>" . $post['content'] . "</p>";
                    echo "<img>" . $post['image'] ;
                    echo "<span class='footer'>Posted By: " . $users['username'] . " Posted On: " . $post['created_at'] . "</span>";
                    echo "</div>";
                }
            }
        ?>
	</div>
</div>