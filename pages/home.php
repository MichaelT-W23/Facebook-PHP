<?php
require_once('mysqli_config_project.php');

// Query to fetch all users from the Users table
$query = "SELECT id, name, school, birthday, hometown FROM users";
$result = mysqli_query($dbc, $query);

if (!$result) {
    echo "<h2>We are unable to process this request right now.</h2>";
    echo "<h3>Please try again later.</h3>";
    exit;
}

// Fetch all rows
$all_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($dbc);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People List</title>
</head>
<body>

    <?php include './components/banner.php'; ?>

    <div class="container">
        <h2>List of People</h2>
        <div class="cards-container">
            <?php
            if (!empty($all_rows)) {
                foreach ($all_rows as $row) {
                    echo '<div class="card">';
                    echo '  <a href="/posts?userid=' . htmlspecialchars($row['id']) . '&name=' . urlencode($row['name']) . '">';
                    echo '      <div class="card-header">' . htmlspecialchars($row['name']) . '</div>';
                    echo '      <div class="card-body">';
                    echo '          <p><strong>School:</strong> ' . htmlspecialchars($row['school']) . '</p>';
                    echo '          <p><strong>Birthday:</strong> ' . htmlspecialchars($row['birthday']) . '</p>';
                    echo '          <p><strong>Hometown:</strong> ' . htmlspecialchars($row['hometown']) . '</p>';
                    echo '      </div>';
                    echo '  </a>';
                    echo '</div>';
                }
            } else {
                echo "<p>No records found</p>";
            }
            ?>
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
  width: 80%;
  margin: 20px auto;
  text-align: center;
}

h2 {
  text-align: center;
}

.cards-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.card {
  width: 300px;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  text-align: left;
  transition: transform 0.2s ease-in-out;
}

.card:hover {
  transform: scale(1.05);
}

.card a {
  text-decoration: none;
  color: inherit;
  display: block;
}

.card-header {
  background-color: #f2f2f2;
  padding: 15px;
  font-size: 18px;
  font-weight: bold;
  text-align: center;
}

.card-body {
  padding: 15px;
}

.card-body p {
  margin: 5px 0;
  color: #555;
}

</style>

</html>
