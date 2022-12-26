const form = document.getElementById("signup");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirmPassword");
const message = document.getElementById("message");
const email = document.getElementById("email");
var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

const validate = () => {
  if (password.value != confirmPassword.value) {
    message.innerText = "Passwords do not match!";
    return false;
  }
  if (password.value.length < 8) {
    message.innerText = "Passwords should be at least 8 Characters!";
    return false;
  }
  if (format.test(password.value)) {
    return true;
  } else {
    message.innerText = "Password must contain an special character!";
    return false;
  }
};
