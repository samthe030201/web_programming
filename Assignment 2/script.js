// Validate login form
function validateLogin() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    if (username === "" || password === "") {
      alert("Please fill out all fields.");
      return false;
    }
    return true;
  }
  
  // Validate registration form
  function validateRegister() {
    let username = document.getElementById("newUsername").value;
    let password = document.getElementById("newPassword").value;
    let confirmPassword = document.getElementById("confirmPassword").value;
    if (username === "" || password === "" || confirmPassword === "") {
      alert("Please fill out all fields.");
      return false;
    }
    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      return false;
    }
    return true;
  }
  