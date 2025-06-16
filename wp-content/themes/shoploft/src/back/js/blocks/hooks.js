import axios from "axios";

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

document.querySelector('.buy-in-one-click')?.addEventListener('click', function () {
    const _el = this;
    const product_id = _el.getAttribute('data-product_id');
    const product_qty = _el.getAttribute('data-quantity');

    document.querySelector('#modalBuyNow')?.remove();

    _el.setAttribute('disabled', 'true');

    axios.get(api_settings.ajax_url, {
        params: {
            nonce: api_settings.nonce,
            action: 'get_buy_in_one_click',
            product_id,
            product_qty
        }
    })
        .then(function (response) {
            const data = response.data;

            if (data.success) {
                document.querySelector('.modalOverlay').insertAdjacentHTML('beforeend', data.data.popup_html);

                if (lastOverlay)
                    activeToggle(lastOverlay);

                activeToggle(document.querySelector('#modalBuyNow'));
                lastOverlay = document.querySelector('#modalBuyNow');
            }

            _el.removeAttribute('disabled');
        })
        .catch(function (error) {
            console.log(error);

            _el.removeAttribute('disabled');
        });
});

document.body.addEventListener('submit', function(event) {
    if (event.target.getAttribute('id') && event.target.getAttribute('id') === 'buy_in_one_click_form') {
        event.preventDefault();

        const form_el = document.querySelector('#buy_in_one_click_form');
        const formData = new FormData(form_el);

        formData.append('nonce', api_settings.nonce);
        formData.append('action', 'buy_in_one_click');


        axios.post(api_settings.ajax_url, formData)
            .then(function (response) {
                console.log(response.data);

                if (lastOverlay) {
                    activeToggle(lastOverlay);
                    lastOverlay = null;
                }
            })
            .catch(function (error) {
                console.log(error);

                if (lastOverlay) {
                    activeToggle(lastOverlay);
                    lastOverlay = null;
                }
            });
    }
});