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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../services/style2.css">
    <link rel="stylesheet" href="../sidebar/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <?php
        // Set the number of rows per page
        $rows_per_page = 8;

        // Get the current page number from the URL
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Calculate the starting row number for the current page
        $start = ($page_number - 1) * $rows_per_page;

        // Query the database for the current page's rows
        $row = mysqli_query($conn, "SELECT *
        FROM reservation 
        JOIN user on reservation.user_id=user.id 
        WHERE reservation.admin_id='$admin_id' and reservation.status='pending'
        ORDER BY reservation.id DESC
        LIMIT $start, $rows_per_page");
        $i = 1;
        ?>

        <div class="container">
            <div class="main-container">
                <h1>New Booking</h1>
                <table>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>gmail</th>
                        <th>No of Guests</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($row as $row) : ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["guest-count"]; ?></td>
                            <td class="status <?php echo strtolower($row['status']); ?>"><?php echo $row['status']; ?></td>
                            <td><button class="view-btn" onclick="openModal('<?php echo $row['id']; ?>')">View</button></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <!-- Add pagination links -->
                <?php
                // Query the database to count the total number of rows
                $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM reservation WHERE admin_id='$admin_id'and reservation.status='pending'");
                $row = mysqli_fetch_assoc($result);
                $total_rows = $row['total'];

                // Calculate the total number of pages
                $total_pages = ceil($total_rows / $rows_per_page);
                ?>

                <div class="pagination">
                    <?php if ($page_number > 1) : ?>
                        <a href="?page=<?php echo $page_number - 1; ?>">Previous</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <?php if ($i == $page_number) : ?>
                            <span class="current-page"><?php echo $i; ?></span>
                        <?php else : ?>
                            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($page_number < $total_pages) : ?>
                        <a href="?page=<?php echo $page_number + 1; ?>">Next</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p id="modal-content"></p>
            </div>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on the action link, open the modal
            function openModal(id) {
                modal.style.display = "block";
                // Make an AJAX request to fetch the details for the selected row
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Update the modal content with the response from the server
                        document.getElementById("modal-content").innerHTML = this.responseText;
                    }
                };
                xhr.open("GET", "pending-details.php?id=" + id, true);
                xhr.send();
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </section>

</body>

</html>

</section>
<script src="../sidebar/script.js">
</script>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function acceptReservation(res_id) {
        var xhr = new XMLHttpRequest();
        console.log(res_id);
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Handle the response from the server
                console.log(this.responseText);
                Swal.fire({
                    title: 'Reservation accepted!',
                    text: this.responseText,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }
        };
        xhr.open('GET', `accept.php?id=${res_id}`);
        xhr.send();
    }

    function rejectReservation(res_id) {
        // code to reject reservation
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Handle the response from the server
                console.log(this.responseText);
                Swal.fire({
                    title: 'Reservation rejected!',
                    text: this.responseText,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }
        };
        xhr.open('GET', `reject.php?id=${res_id}`);
        xhr.send();
    }
</script>