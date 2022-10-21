const loadingSpinner = document.querySelector('.lds-dual-ring');
const header = document.querySelector('main').querySelector('h1');
let amountOfGames = 0;

const addGameBoxes = async (gameList) => {
  for (i in gameList) {
    let box = document.createElement('div');
    box.id = gameList[i].id;
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

    let gameAddAction = document.createElement('img');

    gameAddAction.src = '../img/dashSign.svg';
    gameAddAction.alt = 'plus icon';
    gameAddAction.classList.add('plusSign');

    gameAddAction.gameId = gameList[i].id;
    gameAddAction.addEventListener('click', deleteGame);

    text.appendChild(metacritic);
    box.appendChild(image);
    box.appendChild(text);

    box.appendChild(gameAddAction);
    content.appendChild(box);
  }
};

const deleteGame = ({ currentTarget }) => {
  fetch('../deleteGame.php', {
    method: 'POST',
    headers: {
      Accept: 'application/json, text/plain, */*',
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(currentTarget.gameId),
  })
    .then((res) => res.json())
    .then((res) => {
      amountOfGames--;
      header.innerText = `Your games (${amountOfGames}):`; 
      document.getElementById(currentTarget.gameId).remove()
    });
};

window.addEventListener('load', async () => {
  header.innerText = 'Your games:';
  let AddedGamesList = await fetch('../getGames.php');
  AddedGamesList = await AddedGamesList.json();
  amountOfGames = AddedGamesList.length;
  let gameList = [];
  for (const id of AddedGamesList) {
    gameList.push(await getGame(id));
  }
  header.innerText = `Your games (${amountOfGames}):`;
  loadingSpinner.style.display = 'none';
  console.log(gameList);
  content.innerHTML = '';
  addGameBoxes(gameList);
});

const getGame = async (id) => {
  const options = {
    method: 'GET',
    headers: {
      'X-RapidAPI-Key': '0b21ba9fb1mshf6f754ab0caa350p1038cdjsn604b58c3604e',
      'X-RapidAPI-Host': 'rawg-video-games-database.p.rapidapi.com',
    },
  };

  let response = await fetch(
    `https://rawg-video-games-database.p.rapidapi.com/games/${id}?key=04194b960c3949d28bede514246132b8`,
    options
  );

  response = response.json();

  return response;
};
