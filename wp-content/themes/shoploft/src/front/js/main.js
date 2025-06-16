const aside = document.querySelector('.aside');
const body = document.querySelector('body');
const menuToggle = document.getElementById("menuToggle");
const menuToggle2 = document.getElementById("menuToggle2");
const toggleIcon = menuToggle.querySelector('.toggle2');
const siteNav = document.querySelector('.site-nav');
const catalogMenu = document.querySelector('.catalog-menu');
const catalogLinks = document.querySelectorAll('.calalog-menu-link');
const allSubmenus = document.querySelectorAll('.submenu');
const toggleButtons = document.querySelectorAll('.toggle-submenu-btn');

// 🔹 Overlay element for submenu
const overlay = document.createElement('div');
overlay.classList.add('submenu-overlay');
document.body.appendChild(overlay);

let isNavVisible = false;

// 🔹 Toggle navigation menu
menuToggle.addEventListener('click', () => {
  isNavVisible = !isNavVisible;
  overlay.classList.remove('active');
  toggleIcon.classList.toggle('active', isNavVisible);
  siteNav.classList.toggle('active', isNavVisible);
  catalogMenu.classList.toggle('active', !isNavVisible);
  
});

menuToggle2.addEventListener('click', () => {
  isNavVisible = !isNavVisible;
  overlay.classList.toggle('active');
  aside.classList.toggle('open');
  toggleIcon.classList.toggle('active', isNavVisible);
  body.classList.toggle('left');
  document.querySelector('html').classList.toggle('left');
});


// 🔹 Add active-line to the parent .calalog-menu-link of opened submenu
function showActiveLine(link) {
  link.classList.add('active-line');
}

// 🔹 Remove active-line from all .calalog-menu-link
function hideAllActiveLines() {
  document.querySelectorAll('.calalog-menu-link').forEach(link => {
    link.classList.remove('active-line');
  });
  body.classList.remove('left');
  document.querySelector('html').classList.remove('left');
}

// 🔹 Open specific submenu and update active-line
function openSubmenu(currentSubmenu) {
  // Close all other submenus
  allSubmenus.forEach(sub => {
    if (sub !== currentSubmenu) {
      sub.classList.remove('active');
      
      aside.style.overflowX = "auto";
      aside.style.overflowY = "auto";
    }
  });

  currentSubmenu.classList.add('active');
  aside.style.overflowX = "initial";
  aside.style.overflowY = "initial";
  if(window.innerWidth < 1450){
    console.log('test');
    aside.style.overflowY = "scroll";
  }
  overlay.classList.add('active');
  overlay.style.pointerEvents = "inherit"

  // Update active-line class
  hideAllActiveLines();
  const parentLink = currentSubmenu.closest('.catalog-menu-list')?.querySelector('.calalog-menu-link');
  if (parentLink) {
    showActiveLine(parentLink);
    body.classList.add('left');
    document.querySelector('html').classList.add('left');
  }
}

// 🔹 Close all submenus and remove highlights
function closeAllSubmenus() {
  allSubmenus.forEach(sub => sub.classList.remove('active'));
  overlay.classList.remove('active');
  overlay.style.pointerEvents = "none"
  hideAllActiveLines();
  aside.classList.remove('open');
  body.classList.remove('left');
  document.querySelector('html').classList.remove('left');
}

// 🔹 Handle submenu link click
catalogLinks.forEach(link => {
  link.addEventListener('click', (e) => {
    e.preventDefault();
    const parentLi = link.closest('.catalog-menu-list');
    const submenu = parentLi.querySelector('.submenu');

    if (submenu.classList.contains('active')) {
      closeAllSubmenus();
    } else {
      openSubmenu(submenu);
    }
  });
});

// 🔹 Close buttons inside submenu
document.querySelectorAll('.close-submenu').forEach(btn => {
  btn.addEventListener('click', closeAllSubmenus);
});

// 🔹 Clicking overlay closes all
overlay.addEventListener('click', closeAllSubmenus);

// 🔹 Accordion toggle logic for inner submenu
toggleButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const parent = btn.closest('.has-sub');
    const submenuInner = parent.querySelector('.submenu-inner');

    if (submenuInner.classList.contains('active')) {
      submenuInner.style.maxHeight = submenuInner.scrollHeight + 'px';
      requestAnimationFrame(() => {
        submenuInner.style.maxHeight = '0px';
      });
      submenuInner.classList.remove('active');
    } else {
      submenuInner.style.maxHeight = '0px';
      submenuInner.classList.add('active');
      requestAnimationFrame(() => {
        submenuInner.style.maxHeight = submenuInner.scrollHeight + 'px';
      });
    }
  });
});

toggleButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const submenuList = btn.closest('.submenu-list');
    submenuList.classList.toggle('active');
  });
});



/// ПОШУК /// 
const products = [
  { name: "Світильник 1 ", img: "../images/pics/1.webp", link: "#" },
  { name: "Світильник 2", img: "../images/pics/1.webp", link: "#" },
  { name: "Світильник 3", img: "../images/pics/1.webp", link: "#" },
];

const input = document.querySelector('.input-search');
const resultsBox = document.getElementById('searchResults');

input.addEventListener('input', function () {
  const query = this.value.toLowerCase();
  resultsBox.innerHTML = '';

  if (query.length < 1) {
    resultsBox.style.display = 'none';
    return;
  }

  const filtered = products.filter(p => p.name.toLowerCase().includes(query));

  if (filtered.length > 0) {
    filtered.forEach(p => {
      const item = document.createElement('a');
      item.href = p.link;
      item.className = 'search-result-item';
      item.innerHTML = `<img src="${p.img}" alt="${p.name}"><span>${p.name}</span>`;
      resultsBox.appendChild(item);
    });
    resultsBox.style.display = 'block';
  } else {
    resultsBox.style.display = 'none';
  }
});

document.addEventListener('click', function (e) {
  if (!document.querySelector('.group-search').contains(e.target)) {
    resultsBox.style.display = 'none';
  }
});



const toggleBtn = document.getElementById("searchToggle");
const groupSearch = document.querySelector(".group-search");

toggleBtn?.addEventListener("click", () => {
  groupSearch.classList.toggle("active");
});

// Щоб закривати поле при кліку поза ним
document.addEventListener("click", (e) => {

  if (!groupSearch.contains(e.target)) {
    groupSearch.classList.remove("active");
  }
});