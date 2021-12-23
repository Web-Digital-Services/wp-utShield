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