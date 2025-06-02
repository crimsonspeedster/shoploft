document.querySelectorAll('.sort-options > li').forEach(item => item.addEventListener('click', function () {
    console.log('clicked');

    const ordering_form_el = document.querySelector('.woocommerce-ordering');
    const current_val = item.getAttribute('data-value');

    ordering_form_el.querySelector('select').value = current_val;
    ordering_form_el.submit();
}));