// Function to delete the "user" cookie
function deleteCookie() {
    // Set the expiration date to a date in the past
    const expires = "expires=Thu, 01 Jan 1970 00:00:00 UTC";
    // Set the cookie with the name "user" and expiration date in the past to delete it
    document.cookie = "user=;" + expires + ";path=/";
}


// Set logout button to delete user variable from cookies
const logoutButton = document.getElementById("logout-button");

if(logoutButton != null)
{
    logoutButton.addEventListener("click", function(event) {
        event.preventDefault(); // prevent the link from following the URL
        
        // Delete user variable from cookies
        deleteCookie();
    
        // Redirect to index.php
        window.location.href = "index.php";
    });
}
