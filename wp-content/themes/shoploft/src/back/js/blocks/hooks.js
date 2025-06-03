jQuery(document).ready(function($) {
    $(document.body).on('added_to_cart', function(event, fragments, cart_hash) {
        if (lastOverlay)
            activeToggle(lastOverlay);

        activeToggle(overlayModal['addProduct']);
        lastOverlay = overlayModal['addProduct'];
    });
});

document.body.addEventListener('click', function(event) {
    if (event.target.classList.contains('closeModal') || event.target.closest('.closeModal') || event.target.classList.contains('modalOverlay')) {
        if (lastOverlay) {
            activeToggle(lastOverlay);
            lastOverlay = null;
        }
    }
});