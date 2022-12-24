const form = document.getElementById("signup");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirmPassword");
const message = document.getElementById("message");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  validate();
});

const validate = () => {
  if (password.value != confirmPassword.value) {
    message.innerText = "Passwords do not match!";
  }
  if (password.value.length < 8) {
    message.innerText = "Passwords should be at least 8 Characters!";
  }
  return false;
};
