<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FullCalendar CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />

    <!-- jQuery library -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

    <!-- FullCalendar JavaScript -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<!-- <style>
#calendar {
    height: 200px;
}
</style> -->

<body>
    <div id='calendar'></div>
</body>
<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: {
                url: 'fetch-booking-data.php',
                type: 'GET',
                data: {
                    start: 'start',
                    end: 'end'
                },
                success: function(data) {
                    console.log(data);
                }
            }
        });
    });
</script>

</html>