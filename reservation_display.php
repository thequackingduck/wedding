<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Abrar & Aljosa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />

    <!-- Favicons -->
    <link rel="icon" href="/images/diamond.png" type="image/x-icon">


    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<style>
    *{
        color: black;
    }
</style>
<body style="background-image: url('images/list_of_guests.png'); background-size: cover; background-repeat: no-repeat;">

    <div class="container" >
        <div class="row" >
           
                <div class="panel" style="background: transparent;">
                    <div class="panel-heading" style="display: flex; justify-content: space-between; align-items: center; margin-top: 5%;">
                        <h4 class="title" style="font-weight: bold;">List of Attendees</h4>
                        <form action="download.php" method="POST">
                            <button type="submit" name="submit" class="btn btn-primary" style="color: black;">DOWNLOAD</button>
                        </form>
                    </div>
                    <div class="table" >
                        <table class="table" style="background: transparent;">                  
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Reservation</th>
                                    <th>Guests</th>
                                    <th>Other Events</th>
                                    <th>Song</th>
                                </tr>
                                <?php
                                $sql = "SELECT * FROM reservation";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                       
                                        $firstname = $row['firstname'];
                                        $lastname = $row['lastname'];
                                        $email = $row['email'];
                                        $reserve = $row['reserve'];
                                        $guest = $row['guest'];
                                        $events = $row['events'];
                                        $song = $row['song'];                                    
                                            echo '
                                            <tr class="reservation-row">
                                                <td>' . $firstname . ' ' . $lastname . '</td>
                                                <td>' . $email . '</td>
                                                <td>' . $reserve . '</td>
                                                <td>' . $guest . '</td>
                                                <td>' . $events . '</td>
                                                <td>' . $song . '</td>
                                            </tr>
                                            ';                                        
                                    }
                                }
                                ?>





                        </table>
                    </div>

                </div>
            
        </div>
    </div>
</body>
<script>

    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("search");
        const reservationRows = document.querySelectorAll(".reservation-row");

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.trim().toLowerCase();

            reservationRows.forEach(function (row) {
                const rowContent = row.textContent.toLowerCase();
                if (rowContent.includes(searchTerm)) {
                    row.style.display = ""; // Show row
                } else {
                    row.style.display = "none"; // Hide row
                }
            });
        });
    });


</script>

</html>