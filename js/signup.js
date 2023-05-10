// Get a reference to the form and the submit button
const signupForm = document.getElementById("signup-form");
const signupSubmitBtn = document.getElementById("signup-button");

// Attach an event listener to the submit button
signupSubmitBtn.addEventListener('click', (e) => {
  e.preventDefault(); // Prevent the default form submission

  // Get the input values
  const name = signupForm.elements['name'].value;
  const email = signupForm.elements['email'].value;
  const password = signupForm.elements['password'].value;

  if(name == "" || email == "" || password == "")
  {
    alert("Sign up formular has not been completed rightfully!")
    return;
  }

  // Create an object with the form data
  const formData = { "name": name, "email": email, "password": password };

  // Make a POST request to the API endpoint
  fetch('api/createaccount.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(formData),
  })
    .then(response => response.text())
    .then(data => {
      if(data.includes("success"))
      {
        alert("Account has been successfully created");

        window.location.href = "login.php";
      }
      else
      {
        alert("Email has been already used!");
      }
    })
    .catch((error) => {
      console.error('Error:', error);
      // Handle the error, such as show an error message
    });
});
