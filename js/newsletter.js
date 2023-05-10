// Get a reference to the form and the submit button
const form = document.getElementById("newsletter-form");
const submitBtn = document.getElementById("newsletter-button");

// Attach an event listener to the submit button
submitBtn.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent the default form submission
});

function Subscribe()
{
    const email = document.getElementById("newsletter-email").value;

    if(email == "" || !email.includes("@"))
    {
        alert("You must enter a valid email!")
        return;
    }

    // Create an object with the form data
    const formData = { "email": email };

    // Make a POST request to the API endpoint
    fetch('api/subscribe.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData),
    })
        .then(response => response.text())
        .then(data => {
        if(data.includes("success"))
        {
            alert("You have successfully subscribed to our newsletter! Thanks");
        }
        else
        {
            alert("You have already subscribed to our newsletter! Thank you");
        }
        })
        .catch((error) => {
        console.error('Error:', error);
        // Handle the error, such as show an error message
        });
}