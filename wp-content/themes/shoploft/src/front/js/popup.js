const overlays = document.querySelector(".overlays");
const modals = overlays?.querySelectorAll('.modal');
const triggers = document.querySelectorAll('[data-trigger-modal]');

const overlayModal = {};
modals?.forEach(el => overlayModal[el.dataset.modal] = el);
let lastOverlay = null;

const activeToggle = element => {
    if (!element) return;
    element?.classList.toggle('active');
};

overlays?.addEventListener('click', e => {
    let target = e.target;
    let modal = overlays.querySelector(".modal.active");
    
    if (overlays == target 
        || modal.querySelector(".closeModal") == target.closest(".closeModal")){
            if (lastOverlay){
                activeToggle(lastOverlay);
                lastOverlay = null;
            }
        }
});

triggers?.forEach(trigger => {
    let triggerName = trigger.dataset?.triggerModal;
    if (!triggerName && !triggerName in overlayModal) return;

    trigger.addEventListener('click', () => {
        if (lastOverlay) activeToggle(lastOverlay);
        activeToggle(overlayModal[triggerName]);
        lastOverlay = overlayModal[triggerName];
    });
});

/* const openBtn = document.querySelector('.trigger-add-to-cart');
const closeBtn = document.querySelector('.closeModal');
const exitBtn = document.querySelector('.exit-btn');
const overlays = document.querySelector('.modalOverlay');


function openModal() { 
    overlays.classList.add('active');
    document.body.classList.add('modal-open');
}

function closeModal() {
    overlays.classList.remove('active');
    document.body.classList.remove('modal-open');
}

if(openBtn){
    openBtn.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    exitBtn.addEventListener('click', closeModal);    
    overlays.addEventListener('click', function(e) {
    if (e.target === overlays) closeModal();
    });
} */

/* trigger-enter */
/* const openBtn2 = document.querySelector('.trigger-enter');

if(openBtn2){
    openBtn2.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    exitBtn.addEventListener('click', closeModal);    
    overlays.addEventListener('click', function(e) {
    if (e.target === overlays) closeModal();
    });
} */

/* trigger-registration */
/* const openBtn3 = document.querySelector('.reGistrationTrigger');

if(openBtn3){
    openBtn3.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    exitBtn.addEventListener('click', closeModal);    
    overlays.addEventListener('click', function(e) {
    if (e.target === overlays) closeModal();
    });
} */