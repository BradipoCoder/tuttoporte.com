/**
 * Accordion
 */

jQuery().ready(function(){
  arm_accordion();
});

function arm_accordion(){
  jQuery('.wrapper-accordion').each(function(e){
    jQuery(this).addClass('wrapper-accordion-' + e);
    jQuery('.wrapper-accordion-content', jQuery(this)).addClass('wrapper-accordion-content-' + e);
    jQuery('.wrapper-accordion-toggle', jQuery(this)).attr('data-accordion', e);

    jQuery('.wrapper-accordion-toggle', jQuery(this)).click(function(e){
      var n = jQuery(this).attr('data-accordion');
      var content = '.wrapper-accordion-content-' + n;
      var wrapper = '.wrapper-accordion-' + n;

      if (!jQuery(content).hasClass('open')){
        jQuery(content).addClass('open');
        jQuery(wrapper).addClass('open'); 
      } else {
        jQuery(content).removeClass('open');
        jQuery(wrapper).removeClass('open');
      }
    });
  });
}