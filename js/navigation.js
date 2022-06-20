
const hamburgerList = document.querySelector('.hamburger-list');
const list = document.querySelector('.chess-pieces-wrapper');
list.classList.add('list-hidden');

hamburgerList.addEventListener('click', function (e) {
  e.preventDefault();
  if (!e.target.classList.contains('list-hidden')) {
    list.classList.toggle('list-hidden');
  }
});