<?php
session_start();
include('Xuly/doiMK.php');

// Print the POST data for debugging
print_r($_POST);

// Check if the form is submitted
if (isset($_POST['doiMK'])) {
    // Call the doiMK function with the appropriate parameters
    doiMK($_POST['pass_user'], $_POST['new_pass'], $_POST['retype_pass'], $_SESSION['Ma_ND']);
}

// Define the doiMK function in the Xuly/doiMK.php file
function doiMK($oldPassword, $newPassword, $retypePassword, $userID) {
    // Your password change logic goes here
    // Example: Check if the old password matches the one in the database,
    // and if the new password and retype password match before updating the password.
    // This is just a placeholder; you should replace it with your actual logic.

    // Example logic (replace this with your actual logic):
    if ($oldPassword === 'current_password_from_database' && $newPassword === $retypePassword) {
        // Update the password in the database (replace this with your actual database update logic)
        // $userID can be used to identify the user whose password is being changed.
        echo "Password updated successfully!";
    } else {
        echo "Failed to update password. Please check your input.";
    }
}
?>
