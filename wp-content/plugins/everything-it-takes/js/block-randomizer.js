jQuery(function ($) {

    function getRandomInt(max) {
        return Math.floor(Math.random() * max);
    }

    const heroes = document.querySelectorAll('.js-random-hero');
    const spotlights = document.querySelectorAll('.js-random-care-spotlight');

    if ( heroes.length !== 0 ) {
        const random_hero = getRandomInt(heroes.length);
        heroes[random_hero].style.display = 'block';
    }

    if ( spotlights.length !== 0 ) {
        const random_spotlight = getRandomInt(spotlights.length);
        spotlights[random_spotlight].style.display = 'block';
    }

});
