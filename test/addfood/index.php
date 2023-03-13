<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$id = $_GET["page_id"];
if (!empty($_SESSION['user_id']))
    $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Event Planner Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../../frontend/landingpage/css/teststyle.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <header class="navbar">
        <?php
        $result = mysqli_query($conn, "SELECT banquetname FROM banquet where admin_id='$id'");
        $name = mysqli_fetch_assoc($result);
        ?>
        <a href="../../frontend/landingpage/home.php?page_id=<?php echo $id ?>"> <label id="owner"
                style="color: white; text-align: justify; font-weight: bold; white-space: nowrap; cursor: pointer; text-transform: capitalize;">
                <?php echo strtoupper($name['banquetname']); ?></a>
        </label>

        <ul>
            <li><a href="../../frontend/mainpage/index.php">Home</a></li>
        </ul>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <h1>Reservation Form</h1>
        <form id="event-planner-form">
            <?php
            $date = $_GET['BookingFrom'];
            ?>
            <input type="hidden" id="bookingdate" value="<?php echo $date; ?>">
            <?php
            $qry = mysqli_query($conn, "SELECT reservation_cost From banquet where admin_id=$id ");
            $cost = mysqli_fetch_assoc($qry);
            ?>
            <input type="hidden" id="cost" name="cost" value="<?php echo $cost['reservation_cost'] ?>">
            <label for="event-type">Type of Event:</label>
            <select id="event-type" name="event-type">
                <option value="anniversary">Anniversary</option>
                <option value="wedding">Wedding</option>
                <option value="cooperative">Cooperative</option>
                <option value="conference">Conference</option>
            </select>
            <?php
            $qry = mysqli_query($conn, "SELECT capacity from banquet where admin_id=2");
            $limit = mysqli_fetch_assoc($qry);
            ?>

            <label for="guest-count">Number of Guests:</label>
            <input id="guest-count" type="number" name="guest-count" min="0" max="<?php echo $limit['capacity']; ?>"
                class="guest-count-input" oninput="checkGuestCount()" required>

            <script>
            function checkGuestCount() {
                const guestCountInput = document.getElementById('guest-count');
                const maxGuests = <?php echo $limit['capacity']; ?>;
                const guestCount = guestCountInput.value;
                if (guestCount > maxGuests) {
                    guestCountInput.value = maxGuests;
                }
            }
            </script>
            <h1>Menue</h1>
            <h2>1. Appetizers:</h2>
            <fieldset>
                <ul class="image-checkbox-list">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM food WHERE admin_id=2 AND food_type='appitizer'");
                    while ($appetizer = mysqli_fetch_assoc($query)) :
                    ?>
                    <li>
                        <label>
                            <input type="checkbox" name="appetizer[]" value="<?php echo $appetizer['food_name']; ?>"
                                class="price-calculation">
                            <div class="image-checkbox-container">
                                <img src="../../admin/pages/Food/uploads/<?php echo $appetizer['image'] ?>">
                                <div class="image-checkbox-overlay">
                                    <div class="image-checkbox-text">
                                        <p class="image-checkbox-name"><?php echo $appetizer['food_name']; ?></p>
                                        <p class="image-checkbox-price">NRS <?php echo $appetizer['food_price']; ?> per
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </fieldset>
            <h2>2. Soups:</h2>
            <fieldset>
                <ul class="image-checkbox-list">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM food WHERE admin_id=2 AND food_type='soups'");
                    while ($soup = mysqli_fetch_assoc($query)) :
                    ?>
                    <li>
                        <label>
                            <input type="checkbox" name="soup[]" value="<?php echo $soup['food_name']; ?>"
                                class="price-calculation">
                            <div class="image-checkbox-container">
                                <img src="../../admin/pages/Food/uploads/<?php echo $soup['image'] ?>">
                                <div class="image-checkbox-overlay">
                                    <div class="image-checkbox-text">
                                        <p class="image-checkbox-name"><?php echo $soup['food_name']; ?></p>
                                        <p class="image-checkbox-price">NRS <?php echo $soup['food_price']; ?> per</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </fieldset>
            <h2>3. Main-Course:</h2>
            <fieldset>
                <ul class="image-checkbox-list">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM food WHERE admin_id=2 AND food_type='maincourse'");
                    while ($maincourse = mysqli_fetch_assoc($query)) :
                    ?>
                    <li>
                        <label>
                            <input type="checkbox" name="maincourse[]" value="<?php echo $maincourse['food_name']; ?>"
                                class="price-calculation">
                            <div class="image-checkbox-container">
                                <img src="../../admin/pages/Food/uploads/<?php echo $maincourse['image'] ?>">
                                <div class="image-checkbox-overlay">
                                    <div class="image-checkbox-text">
                                        <p class="image-checkbox-name"><?php echo $maincourse['food_name']; ?></p>
                                        <p class="image-checkbox-price">NRS <?php echo $maincourse['food_price']; ?> per
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </fieldset>
            <h2>4. Dessert:</h2>
            <fieldset>
                <ul class="image-checkbox-list">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM food WHERE admin_id=2 AND food_type='dessert'");
                    while ($soup = mysqli_fetch_assoc($query)) :
                    ?>
                    <li>
                        <label>
                            <input type="checkbox" name="dessert[]" value="<?php echo $soup['food_name']; ?>"
                                class="price-calculation">
                            <div class="image-checkbox-container">
                                <img src="../../admin/pages/Food/uploads/<?php echo $soup['image'] ?>">
                                <div class="image-checkbox-overlay">
                                    <div class="image-checkbox-text">
                                        <p class="image-checkbox-name"><?php echo $soup['food_name']; ?></p>
                                        <p class="image-checkbox-price">NRS <?php echo $soup['food_price']; ?> per</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </fieldset>
            <h2>5. Hard Drinks:</h2>
            <fieldset>
                <ul class="image-checkbox-list">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM food WHERE admin_id=2 AND food_type='harddrinks'");
                    while ($soup = mysqli_fetch_assoc($query)) :
                    ?>
                    <li>
                        <label>
                            <input type="checkbox" name="harddrinks[]" value="<?php echo $soup['food_name']; ?>"
                                class="price-calculation">
                            <div class="image-checkbox-container">
                                <img src="../../admin/pages/Food/uploads/<?php echo $soup['image'] ?>">
                                <div class="image-checkbox-overlay">
                                    <div class="image-checkbox-text">
                                        <p class="image-checkbox-name"><?php echo $soup['food_name']; ?></p>
                                        <p class="image-checkbox-price">NRS <?php echo $soup['food_price']; ?> per</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </fieldset>
            <h2>6. soft-drinks:</h2>
            <fieldset>
                <ul class="image-checkbox-list">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM food WHERE admin_id=2 AND food_type='softdrinks'");
                    while ($soup = mysqli_fetch_assoc($query)) :
                    ?>
                    <li>
                        <label>
                            <input type="checkbox" name="softdrinks[]" value="<?php echo $soup['food_name']; ?>"
                                class="price-calculation">
                            <div class="image-checkbox-container">
                                <img src="../../admin/pages/Food/uploads/<?php echo $soup['image'] ?>">
                                <div class="image-checkbox-overlay">
                                    <div class="image-checkbox-text">
                                        <p class="image-checkbox-name"><?php echo $soup['food_name']; ?></p>
                                        <p class="image-checkbox-price">NRS <?php echo $soup['food_price']; ?> per</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </fieldset>
            <!-- <div>Total Price: NRS <span id="total-price"></span></div> -->
            <div class="note"><span>Note:</span>
                <h3> While the cost estimates provided are tentative and subject to change, we strive to provide our
                    clients with the most accurate and up-to-date information possible.</h3>
            </div>
            <div>Reservation Cost: NRS <span id="reservation-cost"><?php echo $cost['reservation_cost'] ?></span></div>
            <div>Tax (5%): NRS <span id="tax"></span></div>
            <div>Total Price: NRS <span id="total-price"></span></div>
            <style>
            .note {
                background-color: #f2f2f2;
                border-left: 6px solid #4CAF50;
                margin-bottom: 15px;
                padding: 10px 20px;
            }

            .note span {
                font-size: 1.2rem;
                font-weight: bold;
                color: red;
            }

            .note h3 {
                font-size: 1rem;
                font-weight: normal;
                margin: 5px 0 0;
            }

            div span {
                font-weight: bold;
            }
            </style>
            <input type="submit" value="Submit" class="submit-button">
        </form>
    </div>
    <footer>
        <?php
        $contactus = mysqli_query($conn, "SELECT * FROM contactus 
       Where admin_id = $id;");
        $contactusresult = mysqli_fetch_assoc($contactus);
        ?>
        <div class="contact-info">
            <h4>Contact Us</h4>
            <?php
            $mapaddress = mysqli_query($conn, "SELECT * FROM map where admin_id=$id");
            $addressresult = mysqli_fetch_assoc($mapaddress);
            ?>
            <p><?php if (empty($addressresult['address'])) {
                    echo 'Address not yet added';
                } else {
                    $words = explode(",", $addressresult['address']);
                    $words = array_filter($words, function ($word) {
                        return strcasecmp(trim($word), "Undefined") !== 0;
                    });
                    $address = implode(", ", $words);
                    echo $address;
                }
                ?><br>Phone: <?php
                                if (empty($contactusresult['number'])) {
                                    echo "+977 9800000001";
                                } else {
                                    echo $contactusresult['number'];
                                }
                                ?><br>Email: <?php
                                                if (empty($contactusresult['email'])) {
                                                    echo 'Nogmailyet@gmail.com';
                                                } else {
                                                    echo $contactusresult['email'];
                                                }
                                                ?></p>
        </div>
        <div class="social-media">
            <h4>Follow Us</h4>
            <ul>
                <li><a href="https://www.facebook.com/banquethouse"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://www.instagram.com/banquethouse"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/banquethouse"><i class="fab fa-twitter"></i></a></li>
            </ul>
        </div>
        <div class="hours">
            <h4>Hours of Operation</h4>
            <p>Monday - Friday: 9:00am - 5:00pm<br>Saturday - Sunday: Closed</p>
        </div>
        <div class="copy-right">
            <hr>
            <p>&copy; 2023 GoFFy Guys. All Rights Reserved.</p>
        </div>
    </footer>
</body>
<script>
let totalPriceString = "0.00"; // define totalPriceString outside of the change event listener
const getPriceForSelectedItems = (inputs, guestCount) => {
    let totalPrice = 0;
    inputs.forEach((input) => {
        if (input.checked) {
            const price = input.parentNode.querySelector(".image-checkbox-price").innerText.replace(
                /[^0-9.-]+/g, "");
            totalPrice += price * Math.ceil(guestCount / 2);
        }
    });
    return totalPrice;
};

const form = document.getElementById("event-planner-form");
form.addEventListener("change", () => {
    const guestCount = document.getElementById("guest-count").value;

    const selectedAppetizers = document.querySelectorAll('input[name="appetizer[]"]:checked');
    const selectedSoups = document.querySelectorAll('input[name="soup[]"]:checked');
    const selectedMainCourses = document.querySelectorAll('input[name="maincourse[]"]:checked');
    const selectedHardDrinks = document.querySelectorAll('input[name="harddrinks[]"]:checked');
    const selectedSoftDrinks = document.querySelectorAll('input[name="softdrinks[]"]:checked');
    const selectedDesserts = document.querySelectorAll('input[name="dessert[]"]:checked');

    const totalPrice =
        getPriceForSelectedItems(selectedAppetizers, guestCount) +
        getPriceForSelectedItems(selectedSoups, guestCount) +
        getPriceForSelectedItems(selectedMainCourses, guestCount) +
        getPriceForSelectedItems(selectedHardDrinks, guestCount) +
        getPriceForSelectedItems(selectedSoftDrinks, guestCount) +
        getPriceForSelectedItems(selectedDesserts, guestCount);

    const reservationCost = parseFloat(document.getElementById("reservation-cost").textContent);
    const tax = totalPrice * 0.05;
    const total = totalPrice + reservationCost + tax;

    document.getElementById("total-price").textContent = total.toFixed(2);
    document.getElementById("tax").textContent = tax.toFixed(2);
});


const bookingdate = document.getElementById('bookingdate');
const eventType = document.getElementById('event-type');
const guestCount = document.getElementById('guest-count');
const appetizers = document.getElementsByName('appetizer[]');
const soups = document.getElementsByName('soup[]');
const maincourse = document.getElementsByName('maincourse[]');
const dessert = document.getElementsByName('dessert[]');
const harddrinks = document.getElementsByName('harddrinks[]');
const softdrinks = document.getElementsByName('softdrinks[]');
form.addEventListener('submit', (e) => {
    e.preventDefault();
    var pageId = new URLSearchParams(window.location.search).get('page_id');
    const totalPrice = parseFloat(document.getElementById("total-price").textContent);
    const totalPriceString = totalPrice.toFixed(2);
    const xhr = new XMLHttpRequest();
    const url = 'submit.php';
    const params =
        `bookingdate=${bookingdate.value}&event-type=${eventType.value}&guest-count=${guestCount.value}&appetizers=${getSelectedItems(appetizers)}&soups=${getSelectedItems(soups)}&maincourse=${getSelectedItems(maincourse)}&dessert=${getSelectedItems(dessert)}&harddrinks=${getSelectedItems(harddrinks)}&softdrinks=${getSelectedItems(softdrinks)}&total-price=${totalPriceString}&page_id=${pageId}`;
    console.log(params);
    xhr.open('POST', url);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (this.responseText.trim() ===
                'You have already made a reservation for this event type on the selected date.') {
                Swal.fire({
                    title: 'Reservation',
                    text: 'Sorry, you have already made a reservation for this event type on the selected date.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            } else {
                Swal.fire({
                    title: 'Reservation',
                    text: this.responseText,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }
        }
    };

    xhr.send(params);
});


function getSelectedItems(items) {
    const selectedItems = [];
    if (items) {
        items.forEach((item) => {
            if (item.checked) {
                selectedItems.push(item.value);
            }
        });
    }
    return selectedItems.join(",");
}
</script>

</html>