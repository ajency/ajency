<?php
/**
 * @package WordPress
 * @subpackage Highend
 */
?>
<!-- BEGIN #contact-panel -->
<aside id="contact-panel">
    <h4 class="hb-focus-color"><?php echo hb_options('hb_quick_contact_box_title'); ?></h4>
    <p class="contact-cap"><?php echo hb_options('hb_quick_contact_box_text'); ?></p>

    <?php echo do_shortcode('[formidable id=14]') ?>

</aside>
<!-- END #contact-panel -->

<!-- BEGIN #hb-contact-button -->
<a id="contact-button"><i class="hb-moon-envelop"></i>Contact us</a>
<!-- END #hb-contact-button -->