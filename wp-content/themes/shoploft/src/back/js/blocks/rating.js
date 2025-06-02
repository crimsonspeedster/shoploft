import axios from 'axios';
import { getCookie, setCookie } from '../functions.js';

if (document.querySelector('[name="current_product_id"]') && document.querySelector('.rating')) {
    const current_product_id = document.querySelector('[name="current_product_id"]').value;
    const rating_parent_el = document.querySelector('.rating');

    if (!getCookie(`rating_product_${current_product_id}`)) {
        document.querySelectorAll('.rating__input').forEach(item => item.addEventListener('change', function () {
            const selected_value = parseInt(item.value);

            rating_parent_el.classList.add('rating--active');
            setCookie(`rating_product_${current_product_id}`, '1', 7);

            axios.get(api_settings.ajax_url, {
                params: {
                    nonce: api_settings.nonce,
                    action: 'set_single_product_rating',
                    rating: selected_value,
                    product_id: current_product_id,
                }
            })
                .then(function (response) {
                    const data = response.data;

                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }));
    }
}
