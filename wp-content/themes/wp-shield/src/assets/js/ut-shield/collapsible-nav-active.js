/** 
 * Fixes the default state of submenus with an active menu in the subnav. 
 * Now the page will load with the active subnav already open. 
 */
 //nav#subnav ul.accordion-menu li ul.is-accordion-submenu li{

  $(function () {
    if ($('nav#subnav ul.accordion-menu > li').hasClass('is-active')){
      console.log('Task returned true');
      ($(this).find('nav#subnav ul.accordion-menu > li').attr("aria-exanded","true"));
      ($(this).find('nav#subnav ul.accordion-menu > li.is-active ul').attr("aria-hidden","false"));
      ($(this).find('nav#subnav ul.accordion-menu > li.is-active ul').toggleClass('display-block'));
  
      ($(this).find('nav#subnav ul.accordion-menu > li').toggleAttrVal('aria-hidden', "true", "false"));
      ($(this).find('nav#subnav ul.accordion-menu > li.is-active ul').toggleAttrVal('aria-hidden', "true", "false"));
      ($(this).find('nav#subnav ul.accordion-menu > li.is-active ul').toggleClass('display-block'));
    }
  })