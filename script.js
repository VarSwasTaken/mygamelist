const loginPopup = document.querySelector('.popup-login'); // login popup window
const toggleLogin = document.querySelector('.loginButton'); // button to show login popup window
const toggleSignup = document.querySelector('.signUpButton'); // button to show sign up popup window
const loginButton = loginPopup.querySelector('button'); // button to submit login/sign up form
const closeLoginPopup = loginPopup.querySelector('.closeLoginPopup'); // cross icon to hide login popup window
const navBar = document.querySelector('.navigation');
const signInOrUpInput = document.querySelector('input[hidden]');
const navBarButtons = navBar.querySelectorAll('button');
const searchForm = navBar.querySelector('form');
const searchInput = navBar.querySelector('input[type="search"]');
const content = document.querySelector('main > .content');
const searchInfo = document.querySelector('main').querySelector('h1');
const main = document.querySelector('main')

const addGameBoxes = (gameList) => {
  for (i in gameList) {
    let box = document.createElement('div');
    box.classList.add('container', 'element');
    let text = document.createElement('div');
    let h1 = document.createElement('h1');
    h1.innerText = gameList[i].name;
    text.appendChild(h1);
    let image = document.createElement('img');
    image.classList.add('cover');
    image.alt = gameList[i].name;
    if (gameList[i].background_image != null) image.src = gameList[i].background_image;
    else
      image.src =
        'https://static.vecteezy.com/system/resources/previews/004/141/669/original/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';
    let genres = document.createElement('p');
    genres.innerText = 'Genres: ';
    for (element of gameList[i].genres) {
      genres.innerText += `${element.name}, `;
    }
    genres.innerText = genres.innerText.slice(0, genres.innerText.length - 2);
    text.appendChild(genres);
    let releaseDate = document.createElement('p');
    releaseDate.innerText = `Release Date: ${gameList[i].released}`;
    text.appendChild(releaseDate);
    let platforms = document.createElement('p');
    platforms.innerText = 'Platforms: ';
    for (element of gameList[i].platforms) {
      platforms.innerText += `${element.platform.name}, `;
    }
    platforms.innerText = platforms.innerText.slice(0, platforms.innerText.length - 2);
    text.appendChild(platforms);
    let metacritic = document.createElement('p');
    if (gameList[i].metacritic != null) metacritic.innerText = `Metacritic score: ${gameList[i].metacritic}`;
    else metacritic.innerText = `Metacritic score: -`;
    let plusIcon = document.createElement('img');
    plusIcon.src = 'plusSign.svg';
    plusIcon.alt = 'plus icon';
    plusIcon.classList.add('plusSign');
    text.appendChild(metacritic);
    box.appendChild(image);
    box.appendChild(text);
    box.appendChild(plusIcon);
    content.appendChild(box);
  }
};

const showBestGames = async (APIkey) => {
  let gamesFound = [];
  const options = {
    method: 'GET',
    headers: {
      'X-RapidAPI-Key': '0b21ba9fb1mshf6f754ab0caa350p1038cdjsn604b58c3604e',
      'X-RapidAPI-Host': 'rawg-video-games-database.p.rapidapi.com',
    },
  };

  let response = await fetch(
    `https://rawg-video-games-database.p.rapidapi.com/games?key=${APIkey}&ordering=-metacritic`,
    options
  );
  response = await response.json();
  response.results.forEach((element) => {
    gamesFound.push(element);
  });
  return gamesFound;
};

const searchGames = async (APIkey, query) => {
  let gamesFound = [];
  const options = {
    method: 'GET',
    headers: {
      'X-RapidAPI-Key': '0b21ba9fb1mshf6f754ab0caa350p1038cdjsn604b58c3604e',
      'X-RapidAPI-Host': 'rawg-video-games-database.p.rapidapi.com',
    },
  };

  let response = await fetch(
    `https://rawg-video-games-database.p.rapidapi.com/games?key=${APIkey}&search=${query}&search_precise=true`,
    options
  );
  response = await response.json();
  response.results.forEach((element) => {
    if (element.reviews_count > 10) gamesFound.push(element);
  });

  if (gamesFound.length > 0) {
    searchInfo.innerText = `Games found (${gamesFound.length}):`;
    return gamesFound;
  }
  searchInfo.innerText = `No results found. Check the best games:`;
  return await showBestGames('04194b960c3949d28bede514246132b8');
};

const showSignUp = () => {
  loginButton.innerText = 'Sign up';
  loginPopup.style.display = 'flex';
  navBar.style.filter = 'blur(8px)';
  main.style.filter = 'blur(8px)';
  navBar.style.pointerEvents = 'none';
  main.style.pointerEvents = 'none';
  navBar.style.userSelect = 'none';
  main.style.userSelect = 'none';
  signInOrUpInput.value = 'sign up';
};

const showSignIn = () => {
  // function to show login popup window after clicking 'Login' button
  loginButton.innerText = 'Sign in';
  loginPopup.style.display = 'flex';
  navBar.style.filter = 'blur(8px)';
  main.style.filter = 'blur(8px)';
  navBar.style.pointerEvents = 'none';
  main.style.pointerEvents = 'none';
  navBar.style.userSelect = 'none';
  main.style.userSelect = 'none';  
  signInOrUpInput.value = 'sign in';
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

toggleLogin?.addEventListener('click', showSignIn);

toggleSignup?.addEventListener('click', showSignUp);

closeLoginPopup?.addEventListener('click', () => {
  loginPopup.style.display = 'none';
  navBar.style.filter = '';
  main.style.filter = '';
  navBar.style.pointerEvents = 'auto';
  main.style.pointerEvents = 'auto';
  navBar.style.userSelect = 'auto';
  main.style.userSelect = 'auto';  
});

window.addEventListener('load', async () => {
  let gameList = await showBestGames('04194b960c3949d28bede514246132b8');
  console.log(gameList);
  content.innerHTML = '';
  addGameBoxes(gameList);
});

searchForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  let gameList = await searchGames('04194b960c3949d28bede514246132b8', searchInput.value);
  console.log(gameList);
  content.innerHTML = '';
  addGameBoxes(gameList);
});
