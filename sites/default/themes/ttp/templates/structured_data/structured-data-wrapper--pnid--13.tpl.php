<?php
/**
 * Structured Data Template
 *
 * PORTE BLINDATE - SOTTOPAGINE
 *
 */
?>
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Product",
  "name" : "<?php print $node_data["node_meta_title"]; ?>",
  "image" : "<?php print $node_data["image_url"]; ?>",
  "description" : "<?php print $node_data["node_meta_description"]; ?>",
  "url" : "<?php print $node_data["node_url"]; ?>",
  "brand" : {
    "@type" : "Brand",
    "name" : "Tuttoporte snc",
    "logo" : "https://www.tuttoporte.com/sites/default/files/logo-ttp_0.png"
  }
}

</script>
