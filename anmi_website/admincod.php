<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webinar Management</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Webinar Management</h2>

    <!-- Form to insert new data -->
    <form action="manage_webinars.php" method="post">
        <h3>Insert New Webinar</h3>
        Webinar No.: <input type="text" name="webinar_no"><br>
        Webinar / Seminar: <input type="text" name="webinar_seminar"><br>
        Date/Time/Day: <input type="text" name="date_time_day"><br>
        In association with: <input type="text" name="association"><br>
        Category: <input type="text" name="category"><br>
        Summary & Presentation: <input type="text" name="summary"><br>
        Registration: <input type="text" name="registration"><br>
        Invite: <input type="text" name="invite"><br>
        YouTube: <input type="text" name="youtube"><br>
        View Photos: <input type="text" name="photos"><br>
        <input type="submit" name="action" value="Insert">
    </form>

    <!-- Display existing data -->
    <h3>Existing Webinars</h3>
    <table>
        <tr>
            <th>Webinar No.</th>
            <th>Webinar / Seminar</th>
            <th>Date/Time/Day</th>
            <th>In association with</th>
            <th>Category</th>
            <th>Summary & Presentation</th>
            <th>Registration</th>
            <th>Invite</th>
            <th>YouTube</th>
            <th>View Photos</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch and display data from the database (assume connection is established)
        $conn = new mysqli('localhost', 'root', '', 'anmi');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM webinars";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <form action='manage_webinars.php' method='post'>
                            <td><input type='text' name='webinar_no' value='" . $row["webinar_no"] . "'></td>
                            <td><input type='text' name='webinar_seminar' value='" . $row["webinar_seminar"] . "'></td>
                            <td><input type='text' name='date_time_day' value='" . $row["date_time_day"] . "'></td>
                            <td><input type='text' name='association' value='" . $row["association"] . "'></td>
                            <td><input type='text' name='category' value='" . $row["category"] . "'></td>
                            <td><input type='text' name='summary' value='" . $row["summary"] . "'></td>
                            <td><input type='text' name='registration' value='" . $row["registration"] . "'></td>
                            <td><input type='text' name='invite' value='" . $row["invite"] . "'></td>
                            <td><input type='text' name='youtube' value='" . $row["youtube"] . "'></td>
                            <td><input type='text' name='photos' value='" . $row["photos"] . "'></td>
                            <td>
                                <input type='hidden' name='original_webinar_no' value='" . $row["webinar_no"] . "'>
                                <input type='submit' name='action' value='Update'>
                                <input type='submit' name='action' value='Delete'>
                            </td>
                        </form>
                    </tr>";
            }
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
































