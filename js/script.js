// define contants for various variables
const passwordField = document.querySelector("#password");
const confirmPasswordField = document.querySelector("#confirm-password");
const submitButton = document.querySelector("#submit-button");

// function that disables the submit button if the password fields dont match
function checkPasswordMatch() {
  if (passwordField.value === confirmPasswordField.value) {
    submitButton.disabled = false;
  } else {
    submitButton.disabled = true;
  }
}

// Function to toggle password visibility
function togglePasswordVisibility(pass_field, thisButton) {
  const showPasswordButton = thisButton;

  if (pass_field === "password") {
    pass_element = passwordField
  } else if (pass_field === "confirm-password") {
    pass_element = confirmPasswordField
  }

  if (pass_element.type === "password") {
    pass_element.type = "text";
    showPasswordButton.classList.remove("btn-dark");
    showPasswordButton.classList.add("btn-outline-dark");
  } else {
    pass_element.type = "password";
    showPasswordButton.classList.remove("btn-outline-dark");
    showPasswordButton.classList.add("btn-dark");
  }
}

// function validatePassword() {
//   const password = passwordField.value;
//   const hasUpperCase = /[A-Z]/.test(password);
//   const hasLowerCase = /[a-z]/.test(password);
//   const hasNumber = /[0-9]/.test(password);
//   const isLongEnough = password.length >= 8;

//   if (hasUpperCase && hasLowerCase && hasNumber && isLongEnough) {
//     submitButton.disabled = false;
//   } else {
//     submitButton.disabled = true;
//   }
//   ;
// }

