
 document.querySelectorAll('.dropdown').forEach(dropdown => {
    const input = dropdown.querySelector('input');
    const options = dropdown.querySelector('.options');
    const items = dropdown.querySelectorAll('.option');

    input.addEventListener('focus', () => {
      dropdown.classList.add('open');
    });

    input.addEventListener('input', () => {
      const filter = input.value.toLowerCase();
      items.forEach(option => {
        const text = option.textContent.toLowerCase();
        option.style.display = text.includes(filter) ? 'block' : 'none';
      });
    });

    items.forEach(option => {
      option.addEventListener('click', () => {
        input.value = option.textContent;
        dropdown.classList.remove('open');
      });
    });

    document.addEventListener('click', (e) => {
      if (!dropdown.contains(e.target)) {
        dropdown.classList.remove('open');
      }
    });
  });