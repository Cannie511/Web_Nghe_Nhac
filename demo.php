<?php
// Handle the form data and save to the database
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = $_POST["data"];

    // Your PHP logic to save data to the database here

    // Send a response back to the client
    echo "Data saved: " . $data;
} else {
    // Handle other HTTP methods (GET, etc.) if needed
    echo "Invalid request method";
}
?>
