<?php
wp_enqueue_script('jquery-ui-accordion');
$output = $title = $interval = $el_class = $collapsible = $active_tab = '';
//
extract(shortcode_atts(array(
    'title' => '',
    'interval' => 0,
    'el_class' => '',
    'collapsible' => 'no',
    'active_tab' => '1'
), $atts));

$unique_id = rand(1,10000);
$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_accordion wpb_content_element '.$el_class.' not-column-inherit', $this->settings['base']);

$output .= "\n\t".'<div class="'.$css_class.'">'; //data-interval="'.$interval.'"
$output .= "\n\t\t".'<div class="wpb_wrapper wpb_accordion_wrapper hb-accordion" id="hb-accordion-' . $unique_id . '" data-initialindex="'.$active_tab.'">';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_accordion_heading'));

$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_accordion');

echo $output;