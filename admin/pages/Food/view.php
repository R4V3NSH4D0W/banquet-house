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
    <link rel="stylesheet" href="../images/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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

        <!-- end upload image section -->


        <!-- start display image section -->
        <h1>Appitizer</h1>
        <div class="image-wrapper">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM food where admin_id='$admin_id' AND food_type='appitizer'");
            foreach ($rows as $rows) :
            ?>
            <div class="media">
                <div class="overlay"></div>
                <img src="./uploads/<?php echo $rows['image']; ?>" alt="">
                <div class="image-details">
                    <p class="delete-button" data-file="<?php echo $rows['image']; ?>"><i class='bx bx-trash'></i></p>
                    <p style="font-size: 10px;"><?php echo $rows['food_desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <h1>Soupes</h1>
        <div class="image-wrapper">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM food where admin_id='$admin_id'AND food_type='Soups'");
            foreach ($rows as $rows) :
            ?>
            <div class="media">
                <div class="overlay"></div>
                <img src="./uploads/<?php echo $rows['image']; ?>" alt="">
                <div class="image-details">
                    <p class="delete-button" data-file="<?php echo $rows['image']; ?>"><i class='bx bx-trash'></i></p>
                    <p style="font-size: 10px;"><?php echo $rows['food_desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <h1>Main-Course</h1>
        <div class="image-wrapper">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM food where admin_id='$admin_id'AND food_type='maincourse'");
            foreach ($rows as $rows) :
            ?>
            <div class="media">
                <div class="overlay"></div>
                <img src="./uploads/<?php echo $rows['image']; ?>" alt="">
                <div class="image-details">
                    <p class="delete-button" data-file="<?php echo $rows['image']; ?>"><i class='bx bx-trash'></i></p>
                    <p style="font-size: 10px;"><?php echo $rows['food_desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <h1>Dessert</h1>
        <div class="image-wrapper">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM food where admin_id='$admin_id'AND food_type='dessert'");
            foreach ($rows as $rows) :
            ?>
            <div class="media">
                <div class="overlay"></div>
                <img src="./uploads/<?php echo $rows['image']; ?>" alt="">
                <div class="image-details">
                    <p class="delete-button" data-file="<?php echo $rows['image']; ?>"><i class='bx bx-trash'></i></p>
                    <p style="font-size: 10px;"><?php echo $rows['food_desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <h1>hard Drinks</h1>
        <div class="image-wrapper">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM food where admin_id='$admin_id'AND food_type='harddrinks'");
            foreach ($rows as $rows) :
            ?>
            <div class="media">
                <div class="overlay"></div>
                <img src="./uploads/<?php echo $rows['image']; ?>" alt="">
                <div class="image-details">
                    <p class="delete-button" data-file="<?php echo $rows['image']; ?>"><i class='bx bx-trash'></i></p>
                    <p style="font-size: 10px;"><?php echo $rows['food_desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <h1>Soft drinks</h1>
        <div class="image-wrapper">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM food where admin_id='$admin_id'AND food_type='softdrinks'");
            foreach ($rows as $rows) :
            ?>
            <div class="media">
                <div class="overlay"></div>
                <img src="./uploads/<?php echo $rows['image']; ?>" alt="">
                <div class="image-details">
                    <p class="delete-button" data-file="<?php echo $rows['image']; ?>"><i class='bx bx-trash'></i></p>
                    <p style="font-size: 10px;"><?php echo $rows['food_desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
<script>
const deleteButtons = document.querySelectorAll(".delete-button");
deleteButtons.forEach(button => {
    button.addEventListener("click", (event) => {
        const image = event.target.dataset.file;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData();
                formData.append("image", image);
                fetch("delete_image.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const media = event.target.closest(".media");
                            media.remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                        } else {
                            console.error("Failed to delete image.");
                        }
                    })
                    .catch(error => console.error(error));
            }
        })
    });
});
</script>
<script src="../sidebar/script.js"></script>
< /html>