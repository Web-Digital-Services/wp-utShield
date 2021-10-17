jQuery(function ($) {

    function getRandomInt(max) {
        return Math.floor(Math.random() * max);
    }

    const results = document.querySelectorAll('.js-random-block');
    const random_number = getRandomInt(2);

    results[random_number].style.display = 'block';

});
