const loginPopup = document.querySelector('.popup-login'); // login popup window
const toggleLogin = document.querySelector('header button:first-of-type'); // button to show login popup window
const toggleSignup = document.querySelector('header button:last-of-type'); // button to show sign up popup window
const loginButton = loginPopup.querySelector('button'); // button to submit login/sign up form
const closeLoginPopup = loginPopup.querySelector('.closeLoginPopup'); // cross icon to hide login popup window
const navBar = document.querySelector('.navigation');
const signInOrUpInput = document.querySelector('input[hidden]');
const navBarButtons = navBar.querySelectorAll('button');

const showSignUp = () => {
  loginButton.innerText = 'Sign up';
  loginPopup.style.display = 'flex';
  navBar.style.filter = 'blur(8px)';
  signInOrUpInput.value = 'sign up';
  navBarButtons[0].disabled = true;
  navBarButtons[1].disabled = true;
};

const showSignIn = () => {
  // function to show login popup window after clicking 'Login' button
  loginButton.innerText = 'Sign in';
  loginPopup.style.display = 'flex';
  navBar.style.filter = 'blur(8px)';
  signInOrUpInput.value = 'sign in';
  navBarButtons[0].disabled = true;
  navBarButtons[1].disabled = true;
};

const getCookie = (cname) => {
  let name = cname + '=';
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return '';
};

const loginProgress = getCookie('loginProgress');
console.log(document.cookie);
console.log(loginProgress);
if (loginProgress) {
  if (loginProgress === 'sign in') showSignIn();
  if (loginProgress === 'sign up') showSignUp();
}

toggleLogin.addEventListener('click', showSignIn);

toggleSignup.addEventListener('click', showSignUp);

closeLoginPopup.addEventListener('click', () => {
  loginPopup.style.display = 'none';
  navBar.style.filter = '';
  navBarButtons[0].disabled = false;
  navBarButtons[1].disabled = false;
});
