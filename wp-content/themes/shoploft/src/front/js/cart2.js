const fields = [
    {
      id: "name",
      validate: (value) => value.trim().split(" ").length >= 2,
      errorText: "Будь ласка, введіть повне ім’я.",
    },
    {
      id: "phone",
      validate: (value) => /^\d{2,3}\s*[-]?\s*\d{3}\s*[-]?\s*\d{3}\s*[-]?\s*\d{1}$/.test(value),
      errorText: "Введіть коректний номер телефону.",
    },
    {
      id: "email",
      validate: (value) =>
        value === "" || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
      errorText: "Введіть коректну e-mail адресу.",
    },
  ];

  fields.forEach(({ id, validate, errorText }) => {
    const input = document.getElementById(id);
    const errorEl = document.getElementById(`${id}-error`);

    input.addEventListener("input", () => {
      const isValid = validate(input.value);
      input.classList.toggle("invalid", !isValid);
      errorEl.classList.toggle("active", !isValid);
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    // --- Радіокнопки ---
    const radios = document.querySelectorAll('input[name="delivery_id"]');
    const containers = document.querySelectorAll(".delivery-address-container");
  
    function toggleContainers() {
      containers.forEach(c => c.classList.remove("active"));
      const checked = document.querySelector('input[name="delivery_id"]:checked');
      const targetId = checked?.getAttribute("data-target");
      const target = document.getElementById(targetId);
      if (target) target.classList.add("active");
    }
  
    radios.forEach(radio => {
      radio.addEventListener("change", toggleContainers);
    });
  
    toggleContainers();
  
    
  });

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