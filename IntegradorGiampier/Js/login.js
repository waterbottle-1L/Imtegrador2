const $btnSignIn = document.querySelector(".sign-in-btn"),
        $btnSignUp = document.querySelector(".sign-up-btn"),
        $signUp = document.querySelector(".sign-up"),
        $signIn = document.querySelector(".sign-in");

const correo = document.getElementById("emailsigin");
const password = document.getElementById("passwordsigin");
const form = document.getElementById("formSigIn");
const parrafo = document.getElementById("typingerror");


document.addEventListener("click", (e) => {
    if (e.target === $btnSignIn || e.target === $btnSignUp) {
        $signIn.classList.toggle("active");
        $signUp.classList.toggle("active");
    }
});