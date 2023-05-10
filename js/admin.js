function EditProduct(id)
{
    window.location.href = "edit-product.php?id=" + id;
}

function DeleteProduct(id) {
  // Show confirmation dialog box
  let confirmed = confirm("Are you sure you want to delete product from database?");

  // If user confirms, make GET request to API endpoint
  if (confirmed) {
    const url = new URL("api/deleteproduct.php", window.location.href);
    url.searchParams.set("id", id);

    fetch(url, {
      method: 'GET'
    })
    .then(response => {
      if (response.ok) {
        // Handle successful response here
        response.text().then(text => {
          if (text.includes("success")) {
            alert("Product has been successfully deleted from database!");
            window.location.href = "index.php";
          }
        });
      } else {
        // Handle error response here
      }
    })
    .catch(error => {
      // Handle network error here
    });
  }
}





function addProduct(event) {
    event.preventDefault(); // Prevent default form submission behavior
  
    const form = document.getElementById("product-form");
    const formData = new FormData(form);
  
    fetch("api/createproduct.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        if(data.includes("success"))
        {
            alert("Product has been successfully created");

            // Remove data from formular
            form.reset();
        }
        else if(data.includes("invalid_image"))
        {
            alert("Invalid image format or size");
        }
        else if (data.includes("no_image"))
        {
            alert("You must select a presentation image for the product!");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
}

function editProduct(event) {
  event.preventDefault(); // Prevent default form submission behavior

  const form = document.getElementById("edit-product-form");
  const formData = new FormData(form);

  fetch("api/editproduct.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      if(data.includes("success"))
      {
          alert("Product has been successfully updated");

          window.location.reload();
      }
      else
      {
          alert("An error occured on updating the product");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
  
const createProductForm = document.getElementById("product-form");
const editProductForm = document.getElementById("edit-product-form");

if(createProductForm)
{
  createProductForm.addEventListener("submit", addProduct);
}

if(editProductForm)
{
  editProductForm.addEventListener("submit", editProduct);
}
  