const $btnSignIn = document.querySelector(".sign-in-btn"),
  $btnSignUp = document.querySelector(".sign-up-btn"),
  $signUp = document.querySelector(".sign-up"),
  $signIn = document.querySelector(".sign-in");

document.addEventListener("click", (e) => {
  if (e.target === $btnSignIn || e.target === $btnSignUp) {
    $signIn.classList.toggle("active");
    $signUp.classList.toggle("active");
  }
});
document.addEventListener("DOMContentLoaded", function () {
  const signUpForm = document.querySelector(".sign-up form");
  const signInForm = document.querySelector(".sign-in form");

  signUpForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(signUpForm);
  });
});
