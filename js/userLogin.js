const container = document.getElementById("container");
const registerbtn = document.getElementById("register");
const loginbtn = document.getElementById("login");

registerbtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginbtn.addEventListener("click", () => {
  container.classList.remove("active");
});



// Make the AJAX request (example using fetch)

// When the form is submitted, make the AJAX request
document.getElementById('loginForm').addEventListener('submit', function(e) {
  e.preventDefault();  // Prevent form from submitting normally

  // Get form data
  const studentID = document.getElementById('StudentID').value;
  const password = document.getElementById('password').value;

  // Make the AJAX request (example using fetch)
  fetch('login.php', {
      method: 'POST',
      body: new URLSearchParams({
          'StudentID': studentID,
          'password': password
      })
  })
  .then(response => response.json())  // Parse the response as JSON
  .then(data => {
      console.log(data);  // Log the full response to the console
      if (data.status === 'error') {
          console.log("Error: " + data.message);  // Log the error message
      } else {
          console.log("Success: " + data.message);  // Log success message
      }
  })
  .catch(error => {
      console.error("Request failed", error);
  });
});