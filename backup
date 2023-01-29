<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>
        Admin Panel
    </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar close">
        <?php
   include 'sidebar.php';
   ?>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Admin Dashboard</span>
        </div>
        <div class="form-box">
            <form>
                <div class="form-group">
                    <h1>Add services</h1>
                    <label for="service-name">Service Name:</label>
                    <input type="text" class="form-control" id="service-name" name="service-name"
                        placeholder="Enter service name" required>
                </div>
                <div class="form-group">
                    <label for="service-description">Service Description:</label>
                    <textarea class="form-control" id="service-description" name="service-description" rows="3"
                        placeholder="Enter service description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="service-price">Service Price:</label>
                    <input type="number" class="form-control" id="service-price" name="service-price"
                        placeholder="Enter service price" required>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>



    </section>
    <script src="script.js">
    </script>
</body>

</html>
<style>
/* Add services */

form {
    width: 50%;
    margin: 0 auto;
}

label {
    font-size: 1em;
    font-weight: bold;
    margin-top: 1em;
    display: block;
}

input,
textarea {
    width: 100%;
    padding: 0.5em;
    margin-top: 0.5em;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 0.5em 1em;
    margin-top: 1em;
    font-size: 1.2em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
</style>