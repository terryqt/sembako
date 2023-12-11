// script.js

document.addEventListener('DOMContentLoaded', function () {
    var categoryButtons = document.querySelectorAll('.category-btn');

    categoryButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var categoryId = button.getAttribute('data-category-id');
            window.location.href = "<?php echo base_url('home/kategori_propuk/'); ?>" + categoryId;
        });
    });
});
