import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

$(document).foundation();

$(function() {                      
    $("a.button.show-for-small-only").click(function() {  
        $("div.filters").toggleClass("active");     
    });
    $("a.button.show-for-small-only").click(function() {  
        $("#toggleIcon").toggleClass("fa-angle-down fa-times");     
    });
});
