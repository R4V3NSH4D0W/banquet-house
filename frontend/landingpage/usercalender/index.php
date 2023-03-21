<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$id = $_GET["page_id"];
$package_id = $_GET['package_id'];

if (!empty($_SESSION['user_id']))
    $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link rel="stylesheet" href="style.css">
    <title>Reservation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- FullCalendar CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />

    <!-- jQuery library -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <link rel="stylesheet" href="../css/teststyle.css">

    <!-- FullCalendar JavaScript -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
</head>

<body>
    <header class="navbar">
        <?php
        $result = mysqli_query($conn, "SELECT banquetname FROM banquet where admin_id='$id'");
        $name = mysqli_fetch_assoc($result);
        ?>
        <a href="../home.php?page_id=<?php echo $id ?>"> <label id="owner"
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
    <div id='calendar'></div>
    <div class="note-container">
        <span class="note">Note</span>
        <p>Click on any valid date to continue reservation
        <p>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    $(document).ready(function() {
        var pageId = new URLSearchParams(window.location.search).get('page_id');
        const packageID = new URLSearchParams(window.location.search).get('package_id');
        console.log(pageId);
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            events: {
                url: 'fetch-booking-data.php?page_id=' + pageId,
            },
            eventRender: function(event, element) {
                if (event.color === 'red') {
                    element.css('background-color', '#FFCDD2');
                    element.css('border-color', '#E57373');
                } else if (event.color === 'green') {
                    element.css('background-color', '#C8E6C9');
                    element.css('border-color', '#81C784');
                } else if (event.color === 'orange') {
                    element.css('background-color', '#f0ad4e');
                    element.css('border-color', 'transparent');
                }
            },
            select: function(start, end) {
                var title = prompt('Event Title:');
                if (title) {
                    $('#calendar').fullCalendar('renderEvent', {
                        title: title,
                        start: start,
                        end: end
                    }, true);
                }
                $('#calendar').fullCalendar('unselect');
            },
            dayClick: function(date, jsEvent, view) {
                var today = moment();
                var reservedDates = $('#calendar').fullCalendar('clientEvents', function(event) {
                    return event.title === 'Reserved';
                }).map(function(event) {
                    return event.start.format('YYYY-MM-DD');
                });

                var clickedDate = date.format('YYYY-MM-DD');

                if (date.isBefore(today, 'day')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'You cannot select past dates.'
                    });
                } else if (reservedDates.includes(clickedDate)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'This date is already reserved.'
                    });
                } else {
                    Swal.fire({
                        title: 'Confirm reservation',
                        text: 'Do you want to make a reservation for ' + clickedDate + '?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Send data through XHR
                            $.ajax({
                                type: 'POST',
                                url: 'make-reservation.php',
                                data: {
                                    page_id: pageId,
                                    booking_date: clickedDate,
                                    packageID: packageID,

                                },
                                success: function(response) {
                                    // Handle success response
                                    console.log(response);
                                    Swal.fire({
                                        title: 'Success',
                                        text: 'Reservation has been made successfully!',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Redirect to some other page
                                            window.location.href =
                                                'http://localhost/banquethouses/frontend/landingpage/home.php?page_id=' +
                                                pageId;
                                        }
                                    });
                                },
                            });
                        }
                    });
                }
            },

            eventAfterRender: function(event, element, view) {
                var today = moment();
                if (event.start.isBefore(today, 'day')) {
                    $(element).addClass('fc-past-event');
                }
            }
        });
    });
    </script>



</body>

</html>