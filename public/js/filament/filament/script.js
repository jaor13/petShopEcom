const signUpButton = document.getElementById('show-signup');
const signInButton = document.getElementById('show-signin'); // Assuming you have this in your login form
const container = document.getElementById('main-container');

signUpButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active"); 
});

signInButton.addEventListener('click', () => {
    container.classList.add("right-panel-active"); 
});