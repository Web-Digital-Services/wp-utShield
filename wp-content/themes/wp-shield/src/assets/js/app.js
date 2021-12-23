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
/** 
 * Fixes the default state of submenus with an active menu in the subnav. 
 * Now the page will load with the active subnav already open. 
 */
 $(function () {
    if ($('nav#subnav ul > li.is-accordion-submenu-parent').hasClass('is-active')){
      ($(this).find('nav#subnav ul > li').attr("aria-exanded","true"));
      ($(this).find('nav#subnav ul > li.is-active ul').attr("aria-hidden","false"));
      ($(this).find('nav#subnav ul > li.is-active ul').toggleClass('display-block'));
  
      ($(this).find('nav#subnav ul > li').toggleAttribute("aria-exanded","true"));
      ($(this).find('nav#subnav ul > li.is-active ul').attoggleAttributetr("aria-hidden","false"));
      ($(this).find('nav#subnav ul > li.is-active ul').toggleClass('display-block'));
    }
  })