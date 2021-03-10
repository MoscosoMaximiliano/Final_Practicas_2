const signInBTN = document.querySelector("#sign-in-btn");
const signUpBTN = document.querySelector("#sign-up-btn");

const container = document.querySelector(".container");

signUpBTN.addEventListener('click', () => {
    container.classList.add("sign-up-mode");
});

signInBTN.addEventListener('click', () => {
    container.classList.remove("sign-up-mode");
});


