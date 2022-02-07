/** 
 * This only shows on mobile: https://everythingittakes.org/provider-directory/
 */
$(function() {                      
  $("a.button.show-for-small-only").click(function() {  
      $("div.filters").toggleClass("active");     
  });
  $("a.button.show-for-small-only").click(function() {  
      $("#toggleIcon").toggleClass("fa-angle-down fa-times");     
  });
});