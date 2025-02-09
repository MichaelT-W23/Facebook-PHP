<?php
require_once('mysqli_config_project.php');

$userId = isset($_GET['userid']) ? (int)$_GET['userid'] : 0;

if ($userId > 0) {
    $query = "SELECT date_posted, content, likes FROM posts WHERE user_id = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $all_posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_stmt_close($stmt);
} else {
    $all_posts = [];
}

mysqli_close($dbc);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $userName; ?>'s Posts</title>
</head>
<body>

    <?php include './components/banner.php'; ?>

    <div class="container">
        <h2>User Posts</h2>
        <div class="post-container">
            <?php
            if (!empty($all_posts)) {
                foreach ($all_posts as $post) {
                    echo '<div class="post-card">';
                    echo '  <div class="post-header">Posted on: ' . htmlspecialchars($post['date_posted']) . '</div>';
                    echo '  <div class="post-content">' . htmlspecialchars($post['content']) . '</div>';
                    echo '  <div class="post-likes">❤️ ' . htmlspecialchars($post['likes']) . ' likes</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No posts found for this user.</p>";
            }
            ?>
        </div>
        
        <div class="button-container">
            <a href="/">
                <button>Go to Home</button>
            </a>
        </div>
    </div>

</body>


<style>

body {
  font-family: Arial, sans-serif;
  background-color: #f9f9f9;
  margin: 0;
  padding: 0;
}

.container {
  width: 60%;
  margin: 20px auto;
  text-align: center;
}

h2 {
  text-align: center;
}

.post-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 15px;
}

.post-card {
  width: 100%;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  padding: 15px;
  text-align: left;
  transition: transform 0.2s ease-in-out;
}

.post-card:hover {
  transform: scale(1.02);
}

.post-header {
  font-size: 14px;
  color: #555;
  margin-bottom: 10px;
}

.post-content {
  font-size: 16px;
  color: #333;
}

.post-likes {
  font-size: 14px;
  color: #777;
  margin-top: 10px;
}

.button-container {
  text-align: center;
  margin-top: 20px;
}

button {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

</style>

</html>
