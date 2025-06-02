document.querySelectorAll('.quantity > button').forEach(item => item.addEventListener('click', function () {
    const parent_el = item.closest('.quantity');
    const input_el = parent_el.querySelector('input');

    let value = parseInt(input_el.value);

    const step = input_el.getAttribute('step') ? parseInt(input_el.getAttribute('step')) : 1;
    const min = input_el.getAttribute('min') ? parseInt(input_el.getAttribute('min')) : 0;
    let max = input_el.getAttribute('max');

    if (max) {
        max = parseInt(max);
    }

    console.log(value);

    if (item.classList.contains('minus')) {
        if (min && value <= min) {
            return;
        }

        if (value > 1) {
            value = value - step;
        }
    }
    else {
        if (max && value >= max) {
            return;
        }

        value = value + step;
    }

    input_el.value = value;
    input_el.dispatchEvent(new Event('input', { bubbles: true }));
}));