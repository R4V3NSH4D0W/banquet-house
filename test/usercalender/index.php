<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Calendar Example</title>

    <!-- FullCalendar CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />

    <!-- jQuery library -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

    <!-- FullCalendar JavaScript -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
</head>

<body>

    <div id='calendar'></div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: 'fetch-booking-data.php',
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
                }
            });
        });
    </script>

</body>

</html>