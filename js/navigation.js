const hamburger = document.querySelector('.hamburger-btn');
const nav = document.querySelector('.menu-header-container');

hamburger.addEventListener('click', function () {
  if (nav.classList.toggle('block')) {
  }
});

// Category Page

const hamburgerList = document.querySelector('.hamburger-list');
const list = document.querySelector('.chess-pieces-wrapper');

if (hamburgerList) {
  list.classList.add('list-hidden');

  hamburgerList.addEventListener('click', function (e) {
    e.preventDefault();
    if (!e.target.classList.contains('list-hidden')) {
      list.classList.toggle('list-hidden');
    }
  });
}
document.getElementById('menu-item-126').classList.remove('nav-hover');