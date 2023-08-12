<?php
include('../database/db.php');
if (isset($_POST['SelectedTitle'])) {
    $selectedTitle = $_POST['SelectedTitle'];

    // Perform the database query to retrieve the message based on the selected title
    // Replace the below code with your actual database query
    $message = ""; // Initialize the message variable

    // Example query: assuming your table name is "reg_debt_reminder"
    $query = mysqli_query($conn, "SELECT Message FROM reg_debt_reminder WHERE Title = '$selectedTitle'");
    $messageRow = mysqli_fetch_array($query);
    if ($messageRow) {
        $message = $messageRow['Message'];
    }

    // Return the message as the response
    echo $message;
}
?>