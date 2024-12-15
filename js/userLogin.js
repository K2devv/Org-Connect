
const container = document.getElementById("container");
const registerbtn = document.getElementById("register");
const loginbtn = document.getElementById("login");

registerbtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginbtn.addEventListener("click", () => {
  container.classList.remove("active");
});


function validateLogin() {
  var StudentID = document.getElementById('StudentID').value;
  var password = document.getElementById('password').value;

  if (StudentID == "" || password == "") {
      document.getElementById('error').innerHTML = "Both fields are required.";
      return false;
  }

  return true;
}

/* darkmode */
document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.getElementById('darkmode-toggle');

  toggle.addEventListener('change', () => {
      document.body.classList.toggle('dark-mode');
  });
});

