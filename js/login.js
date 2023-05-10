
// Function to set the "user" cookie
function setCookie(email) {
    const date = new Date();
    // Set the expiration date to 1 day from now
    date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    // Set the cookie with the name "user" and value "true"
    document.cookie = "user=" + email + ";" + expires + ";path=/";
  }


// Get a reference to the form and the submit button
const loginForm = document.getElementById("login-form");
const loginSubmitBtn = document.getElementById("login-button");

// Attach an event listener to the submit button
loginSubmitBtn.addEventListener('click', (e) => {
  e.preventDefault(); // Prevent the default form submission

  // Get the input values
  const email = loginForm.elements['email'].value;
  const password = loginForm.elements['password'].value;

  if(email == "" || password == "")
  {
    alert("Login formular has not been completed rightfully!")
    return;
  }

  // Create an object with the form data
  const formData = { "email": email, "password": password };

  // Make a POST request to the API endpoint
  fetch('api/login.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(formData),
  })
    .then(response => response.text())
    .then(data => {
      if(data.includes("success"))
      {
        // Save user email in cookies
        setCookie(email);

        window.location.href = "index.php";
      }
      else if(data.includes("incorrect"))
      {
        alert("Password is incorrect");
      }
      else if(data.includes("not_found"))
      {
        alert("This email doesn't exist. Try signing up!");
      }
    })
    .catch((error) => {
      console.error('Error:', error);
      // Handle the error, such as show an error message
    });
});
