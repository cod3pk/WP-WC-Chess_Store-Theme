const hamburger = document.querySelector('.hamburger-btn');
const nav = document.querySelector('.menu-header-container');
const hebrewNav = document.querySelector('.menu-header-hebrew-container');


hamburger.addEventListener('click', function () {
  if (nav.classList.toggle('block')) {
  }
});


hamburger.addEventListener('click', function () {
  if (hebrewNav.classList.toggle('block')) {
  }
});

// Category Page

const hamburgerList = document.querySelector('.hamburger-list');
const list = document.querySelector('.chess-pieces-wrapper');

// if (screen.width < '992px') {
//   list.className = 'list-hidden';
// }

if (hamburgerList) {
  hamburgerList.addEventListener('click', function (e) {
    e.preventDefault();
    if (!e.target.classList.contains('list-hidden')) {
      list.classList.toggle('list-hidden');
    }
  });
}

if (document.getElementById('menu-item-126')) {
  document.getElementById('menu-item-126').classList.remove('nav-hover');
}