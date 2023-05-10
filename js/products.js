// Check if cookie exists function
function checkCookie() {
  var cookies = document.cookie.split(';');
  for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i].trim();
    if (cookie.startsWith("user=")) {
      // Cookie found
      return true;
    }
  }
  // Cookie not found
  return false;
}



function PlaceOrder(totalPrice, productsList)
{

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const address = document.getElementById("address").value;
    const city = document.getElementById("city").value;
    const country = document.getElementById("country").value;
    const zipcode = document.getElementById("zip-code").value;
    const phone = document.getElementById("phone").value;
    const notes = document.getElementById("notes").value;

    // First check every informations are provided
    if(name == "" || email == "" || address == "" || city == "" || country == "" || zipcode == "" || phone == "" )
    {
        alert("Shipping formular is incomplete...");
        return;
    }

    const data = {
        name: name,
        email: email,
        address: address,
        city: city,
        country: country,
        zipcode: zipcode,
        phone: phone,
        notes: notes,
        totalPrice: totalPrice,
        products: productsList
    };

    const apiEndpoint = "api/place-order.php"; 
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", apiEndpoint);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onload = function() {
      if (xhr.status === 200) {
        const response = xhr.responseText;

        if(response.includes("success"))
        {
            alert("Order has been successfully placed");
            window.location.href = "index.php";
        }
      } else {
        console.error("Error occured on submitting your error");
      }
    };
    
    xhr.send(JSON.stringify(data));
}

function AddToWishlist(productId)
{
    // Check if cookie exists
    if(!checkCookie())
    {
      window.location.href = "login.php";;
    }

    const apiEndpoint = "api/add-to-wishlist.php"; 
      
    const xhr = new XMLHttpRequest();
    xhr.open("POST", apiEndpoint);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onload = function() {
      if (xhr.status === 200) {
        const response = xhr.responseText;

        if(response.includes("success"))
        {
            alert("Item added to your wishlist");
            location.reload();
        }
      } else {
        console.error("Error adding item to wishlist");
      }
    };
    
    const data = {
      product_id: productId
    };
    xhr.send(JSON.stringify(data));
}

function AddToCart(productId) {

    // Check if cookie exists
    if(!checkCookie())
    {
      window.location.href = "login.php";;
    }

    const apiEndpoint = "api/add-to-cart.php"; 
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", apiEndpoint);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onload = function() {
      if (xhr.status === 200) {
        const response = xhr.responseText;

        if(response.includes("success"))
        {
            alert("Item added to cart");
            location.reload();
        }
      } else {
        console.error("Error adding item to cart");
      }
    };
    
    const data = {
      product_id: productId
    };
    xhr.send(JSON.stringify(data));
}

function DeleteFromCart(productId)
{
    const apiEndpoint = "api/delete-from-cart.php"; 
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", apiEndpoint);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onload = function() {
      if (xhr.status === 200) {
        const response = xhr.responseText;

        if(response.includes("success"))
        {
            alert("Item deleted from cart");
            location.reload();
        }
      } else {
        console.error("Error deleting item from cart");
      }
    };
    
    const data = {
      product_id: productId
    };
    xhr.send(JSON.stringify(data));
}

function DeleteFromWishlist(productId)
{
    const apiEndpoint = "api/delete-from-wishlist.php"; 
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", apiEndpoint);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onload = function() {
      if (xhr.status === 200) {
        const response = xhr.responseText;

        if(response.includes("success"))
        {
            alert("Item deleted from wishlist");
            location.reload();
        }
      } else {
        console.error("Error deleting item from wishlist");
      }
    };
    
    const data = {
      product_id: productId
    };
    xhr.send(JSON.stringify(data));
}
  