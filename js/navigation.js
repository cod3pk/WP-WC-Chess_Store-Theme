const hamburger = document.querySelector('.hamburger-btn');
const nav = document.querySelector('.page_items-wrapper-2');

hamburger.addEventListener('click', function () {
  nav.classList.toggle('hidden');
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