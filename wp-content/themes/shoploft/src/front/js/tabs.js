const openItem = (evt, itemName) => {
  const tabcontent = document.getElementsByClassName("tabcontent");
  for (let i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  const tablinks = document.getElementsByClassName("tablinks");
  for (let i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("is-active");
  }

  document.getElementById(itemName).style.display = "block";
  evt.currentTarget.classList.add("is-active");
};

document.querySelectorAll(".tablinks").forEach(button => {
  button.addEventListener("click", (e) => {
    const item = button.dataset.item;
    openItem(e, item);
  });
});


document.querySelectorAll('.tablinks').forEach(button => {
    button.addEventListener('click', () => {
        const tabText = button.querySelector('.tab-name')?.textContent.trim();
        const heading = document.querySelector('.place-name h1');
        
        if (tabText && heading) {
            heading.textContent = tabText;
        }
    });
});

 document.querySelectorAll('.toggle-password').forEach(btn => {
    btn.addEventListener('click', () => {
      const input = btn.closest('.input-password').querySelector('input');
      const showIcon = btn.querySelector('.show');
      const hideIcon = btn.querySelector('.hide');

      const isPassword = input.type === 'password';
      input.type = isPassword ? 'text' : 'password';

      showIcon.style.display = isPassword ? 'none' : 'inline';
      hideIcon.style.display = isPassword ? 'inline' : 'none';
    });
  });