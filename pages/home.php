<?php
require_once('mysqli_config_project.php');

// Query to fetch all names from the People table
$query = "SELECT Name FROM People";
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

    <div class="banner">
        <h1>thefacebook</h1>
    </div>

    <h2 style="text-align: center;">List of People</h2>

    <table>
        <tr>
            <th>Name</th>
        </tr>
        <?php
        if (!empty($all_rows)) {
            foreach ($all_rows as $row) {
                echo "<tr><td>" . htmlspecialchars($row['Name']) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='1'>No records found</td></tr>";
        }
        ?>
    </table>

    <div class="button-container">
      <a href="/posts">
        <button>Go to Posts</button>
      </a>
    </div>

</body>

<style>

body {
  font-family: Arial, sans-serif;
  margin: 0;
}

.banner {
  background-color: #3b5998;
  color: white;
  text-align: center;
  padding: 1px;
  font-size: 18px;
  font-weight: bold;
}

table {
  width: 50%;
  border-collapse: collapse;
  margin: 20px auto;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

.button-container {
  text-align: center;
  margin-top: 20px;
}

</style>

</html>
