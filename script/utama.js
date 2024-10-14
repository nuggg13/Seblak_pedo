var toggleOpen = document.getElementById('toggleOpen');
var toggleClose = document.getElementById('toggleClose');
var collapseMenu = document.getElementById('collapseMenu');

function handleClick() {
  if (collapseMenu.style.display === 'block') {
    collapseMenu.style.display = 'none';
  } else {
    collapseMenu.style.display = 'block';
  }
}

toggleOpen.addEventListener('click', handleClick);
toggleClose.addEventListener('click', handleClick);

const carousel = document.getElementById('carousel');
const slides = carousel.children.length;
let index = 0;

document.getElementById('next').addEventListener('click', () => {
  index = (index + 1) % slides;
  carousel.style.transform = `translateX(-${index * 100}%)`;
});

document.getElementById('prev').addEventListener('click', () => {
  index = (index - 1 + slides) % slides;
  carousel.style.transform = `translateX(-${index * 100}%)`;
});