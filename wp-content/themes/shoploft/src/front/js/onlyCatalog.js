 $(document).ready(function () {
    // Main slider with custom SVG arrows
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      fade: true,
      asNavFor: '.slider-nav',
      prevArrow: `<button type="button" class="slick-prev" aria-label="Previous">
        <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M42.75 27L11.25 27" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M27 42.75L11.25 27L27 11.25" stroke="#363535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
      </button>`,
      nextArrow: `<button type="button" class="slick-next" aria-label="Next">
       
<svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none"><path d="M11.25 27L42.75 27" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M27 11.25L42.75 27L27 42.75" stroke="#4E4E4E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>

      </button>`, 
      responsive: [
        {
          breakpoint: 960,
          settings: {
            arrows: false // Hide arrows on small screens
          }
        }
      ]
    });

    // Thumbnail slider
    $('.slider-nav').slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: false,
      centerMode: true,
      focusOnSelect: true,
      arrows: false,
      responsive: [
        {
          breakpoint: 1300,
          settings: {
            slidesToShow: 4
          }
        },
        {
          breakpoint: 960,
          settings: {
            slidesToShow: 3
          }
        }
      ]
    });
  });

// ///////////// SORT //////////

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



