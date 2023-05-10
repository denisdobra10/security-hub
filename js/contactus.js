function ContactUs()
{

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const message = document.getElementById("message").value;

    // First check every informations are provided
    if(name == "" || email == "" || message == "" || phone == "" )
    {
        alert("Shipping formular is incomplete...");
        return;
    }

    const data = {
        name: name,
        email: email,
        phone: phone,
        message: message
    };

    const apiEndpoint = "api/contactus.php"; 
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", apiEndpoint);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onload = function() {
      if (xhr.status === 200) {
        const response = xhr.responseText;

        if(response.includes("success"))
        {
            alert("Contact message has been successfully sent");
            window.location.href = "index.php";
        }
      } else {
        console.error("Error occured on submitting your message");
      }
    };
    
    xhr.send(JSON.stringify(data));
}