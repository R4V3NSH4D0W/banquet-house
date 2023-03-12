<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>
        Admin Panel
    </title>
    <link rel="stylesheet" href="../sidebar/style.css">
    <link rel="stylesheet" href="style2.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <div class="sidebar close">
        <?php
        include '../sidebar/sidebar.php';
        ?>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Dashboard</span>
        </div>
        <section class="user-queries">
            <h2>User Queries</h2>
            <div class="queries-container">
                <?php
                $queries = mysqli_query($conn, "SELECT * FROM query WHERE admin_id=$admin_id ORDER BY STATUS DESC, id DESC LIMIT 6");

                if (mysqli_num_rows($queries) > 0) {
                    while ($query = mysqli_fetch_assoc($queries)) {
                ?>
                        <div class="query <?php echo $query['STATUS']; ?>">
                            <h3><?php echo $query['name']; ?></h3>
                            <p><?php echo $query['message']; ?></p>
                            <p class="query-details"><?php echo $query['email']; ?> | <?php echo $query['phone']; ?></p>
                            <?php if ($query['STATUS'] == 'unread') : ?>
                                <!-- Add this inside the "while" loop where you're displaying the queries -->
                                <a href="#" class="mark-read" data-id="<?php echo $query['id']; ?>">Mark as Read</a>
                            <?php endif; ?>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>No queries found.</p>";
                }
                ?>
            </div>
        </section>


    </section>
</body>

<script src="../sidebar/script.js"></script>
<script>
    // Add this script to your JavaScript file

    // Add an event listener to the "Mark as Read" buttons
    document.querySelectorAll('.mark-read').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            // Get the query ID from the data-id attribute
            var queryId = this.getAttribute('data-id');

            // Send an XHR request to mark_query_as_read.php
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'mark_query_as_read.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Reload the page to update the query status
                    location.reload();
                }
            };
            xhr.send('id=' + queryId);
        });
    });
</script>

</html>