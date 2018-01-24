jQuery(document).ready(function () {
  jQuery("#block-custom-blog-archive-custom-blog-archive ul.years li.year .clicker").click(function () {
    jQuery(this).next('ul.months').slideToggle('fast', function () {
        // Animation complete.
    });
  });
  jQuery("#block-custom-blog-archive-custom-blog-archive ul.months li.month .clicker").click(function () {
    jQuery(this).next('ul.items').slideToggle('fast', function () {
        // Animation complete.
    });
  });
});
