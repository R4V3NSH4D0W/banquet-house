<?php
// Connect to MySQL database
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

// Prepare SQL statement
$sql = "SELECT city, COUNT(*) AS count, FIND_IN_SET(COUNT(*), (SELECT GROUP_CONCAT(COUNT(*) ORDER BY COUNT(*) DESC) FROM map GROUP BY city)) AS rank
        FROM map
        GROUP BY city
        ORDER BY count DESC";

// Execute SQL statement
$result = mysqli_query($conn, $sql);

// Loop through the results and display them
while ($row = mysqli_fetch_assoc($result)) {
  echo "<p>City: " . $row['city'] . "</p>";
  echo "<p>Count: " . $row['count'] . "</p>";
  echo "<p>Rank: " . $row['rank'] . "</p>";
  echo "<hr>";
}

// Close database connection
mysqli_close($conn);
