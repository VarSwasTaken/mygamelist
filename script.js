const loginPopup = document.querySelector('.popup-login'); // login popup window
const toggleLogin = document.querySelector('header button:first-of-type'); // button to show login popup window
const toggleSignup = document.querySelector('header button:last-of-type'); // button to show sign up popup window
const loginButton = loginPopup.querySelector('button'); // button to submit login/sign up form
const closeLoginPopup = loginPopup.querySelector('.closeLoginPopup'); // cross icon to hide login popup window
const navBar = document.querySelector('.navigation');

toggleLogin.addEventListener('click', () => { // function to show login popup window after clicking 'Login' button
    loginButton.innerText = 'Sign in';
    loginPopup.style.display = 'flex';
    navBar.style.filter = 'blur(8px)';
})

toggleSignup.addEventListener('click', () => {
    loginButton.innerText = 'Sign up';
    loginPopup.style.display = 'flex';
    navBar.style.filter = 'blur(8px)';
})

closeLoginPopup.addEventListener('click', () => {
    loginPopup.style.display = 'none';
    navBar.style.filter = '';
})