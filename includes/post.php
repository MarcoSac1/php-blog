<?php
require "includes/db_conn.php";
require "includes/blogpost.php";
$objBlogPost = new posts($conn);
$arrPosts = $objBlogPost->getBlogPosts();
?>
<div id="main">
    <div id="blogPosts">
        <?php
            if (count($arrPosts)) {
                foreach ($arrPosts as $post) {
                    echo "<div class='post'>";
                        echo "<h1>" . $post['id'] . "</h1>";
                        echo "<h1>" . $post['title'] . "</h1>";
                        echo "<p>" . $post['content'] . "</p>";
                        echo "<img>" . $post['image'];
                }
            }
        ?>
	</div>
</div>