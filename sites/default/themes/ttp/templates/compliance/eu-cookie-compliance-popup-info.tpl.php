<?php
/**
 * @file
 * This is a template file for a pop-up prompting user to give their consent for
 * the website to set cookies.
 *
 * When overriding this template it is important to note that jQuery will use
 * the following classes to assign actions to buttons:
 *
 * agree-button      - agree to setting cookies
 * find-more-button  - link to an information page
 *
 * Variables available:
 * - $message:  Contains the text that will be display whithin the pop-up
 * - $agree_button: Contains agree button title
 * - $disagree_button: Contains disagree button title
 */
?>

<div>
  <div class="popup-content container info">
    <div class="row">
      <div class="col-xs-12">
        <div class="popup-text text-left">
          <?php print $message ?>
        </div>
        <div class="popup-buttons text-left">
          <a class="btn btn-default btn-sm agree-button"><?php print $agree_button; ?></a>
        </div>
      </div>
    </div>
  </div>
</div>