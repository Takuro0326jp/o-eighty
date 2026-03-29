document.addEventListener('DOMContentLoaded', () => {
  const items = document.querySelectorAll('.js-animate');

  items.forEach((el, index) => {
    setTimeout(() => {
      el.classList.add('is-visible');
    }, 300 + index * 180);
  });

  const title = document.querySelector('.hero-title');
  if (title) {
    setTimeout(() => {
      title.classList.add('is-visible');
    }, 420);
  }
});