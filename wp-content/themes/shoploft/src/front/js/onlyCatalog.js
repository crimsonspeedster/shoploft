
///////////// SORT //////////

const sortDropdown = document.querySelector('.sort-dropdown');
const sortToggle = document.getElementById('sortToggle');
const sortOptions = document.getElementById('sortOptions');
const selectedOption = document.getElementById('selectedOption');

sortToggle.addEventListener('click', () => {
  sortDropdown.classList.toggle('open');
  sortToggle.classList.toggle('open');
});

sortOptions.addEventListener('click', (e) => {
  if (e.target.tagName === 'LI') {
    selectedOption.textContent = e.target.textContent;
    sortDropdown.classList.remove('open');
    sortToggle.classList.remove('open');    
    // sortBy(e.target.dataset.value);
  }
});

// Закриваємо, якщо клік не по списку
document.addEventListener('click', (e) => {
  if (!sortDropdown.contains(e.target)) {
    sortDropdown.classList.remove('open');
    sortToggle.classList.remove('open');
  }
});