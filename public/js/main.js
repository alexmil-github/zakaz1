let status = document.querySelector('#status');
let price = document.querySelector('#price');
let photo_after = document.querySelector('#photo_after');

status.addEventListener('change', function () {
    // if (this.value === 'Ремонтируется') {
    //     price.disabled = false;
    // } else {
    //     price.disabled = true;
    // }

    // if (this.value === 'Отремонтировано') {
    //     photo_after.disabled = false;
    // } else {
    //     photo_after.disabled = true;
    // }

    this.value === 'Ремонтируется' ? price.disabled = false : price.disabled = true;
    this.value === 'Отремонтировано' ? photo_after.disabled = false : photo_after.disabled = true;
})
