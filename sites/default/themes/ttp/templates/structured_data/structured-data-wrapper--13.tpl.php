<?php
/**
 * Structured Data Template
 *
 * PORTE BLINDATE
 *
 */
?>
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Product",
  "name" : "<?php print $node_data["node_meta_title"]; ?>",
  "image" : "https://www.tuttoporte.com/sites/default/files/styles/square/public/img/news/black-front-door-boblin.jpg",
  "description" : "<?php print $node_data["node_meta_description"]; ?>",
  "url" : "<?php print $node_data["node_url"]; ?>",
  "brand" : {
    "@type" : "Brand",
    "name" : "Tuttoporte snc",
    "logo" : "https://www.tuttoporte.com/sites/default/files/logo-ttp_0.png"
  }
}

</script>
