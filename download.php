<?php
include 'db_connect.php';

$output = "";

if(isset($_POST['submit']))
{
    // Select all rows from the reservation table
    $sql = "SELECT * FROM reservation";
    $result = mysqli_query($con, $sql);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {

         // Set the headers for Excel file download
         header("Content-Type:application/vnd.ms-excel");
         header("Content-Disposition:attachment; filename=reports.xlsx");

        // Start building the HTML table
        $output .= '<table class="table" style="width: 100%">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Reservation</th>
                            <th>Guests</th>
                            <th>Other Events</th>
                            <th>Song</th>
                        </tr>';

        // Loop through each row and add it to the table
        while ($row = mysqli_fetch_array($result)) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $reserve = $row['reserve'];
            $email = $row['email'];
            $guest = $row['guest'];
            $events = $row['events'];
            $song = $row['song'];

            $output .= '<tr class="reservation-row">
                            <td>' . $firstname . ' ' . $lastname . '</td>
                            <td>' . $email . '</td>
                            <td>' . $reserve . '</td>
                            <td>' . $guest . '</td>
                            <td>' . $events . '</td>
                            <td>' . $song . '</td>
                        </tr>';
        }

        // Close the table
        $output .= '</table>';


        // Output the table
        echo $output;
    } else {
        // No data found
        echo 'no data found';
    }
}
?>
}

?>