<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
if (!isset($_SESSION['user_id'])) {
    echo 'please login to add review';
} else {
    if (isset($_POST['review']) && isset($_POST['rating']) && isset($_POST['page_id'])) {
        $user_id = $_SESSION['user_id'];
        $review = $_POST["review"];
        $rating = $_POST["rating"];
        $pageId = $_POST["page_id"];
        $qry = "INSERT INTO review (comment, rating, admin_id, user_id) VALUES ('$review', '$rating', '$pageId', '$user_id')";
        if (mysqli_query($conn, $qry)) {
            echo "Review added successfully.";
        } else {
            echo "An error occurred while adding the review.";
        }
    } else {
        echo "missing Fields";
    }
}
