<?php
/* 
Plugin Name: LinkTexting
Plugin URI: https://www.linktexting.com/ 
Version: 3.2
Author: Brian Clark
Description: A plugin for creating a text-to-dowload form for mobile apps 
*/  

function linktexting_shortcode( $atts ) {

       // Attributes
       extract( shortcode_atts(
              array(
                     'linkid' => 'link_uuid_here',
                     'button_color' => '#aaa',
                     'button_color_hover' => '#666',
              ), $atts )
       );

       // Code
       return '<style type="text/css">'.
              '  .linkTextingButton_oq3j39q0 {'.
              '    background-color: '.$atts['button_color'].';'.
              '    background: '.$atts['button_color'].';'.
              '    box-shadow: none;'.
              '    text-shadow: none;'.
              '  }'.
              '  .linkTextingButton_oq3j39q0:hover {'.
              '    background-color: '.$atts['button_color_hover'].';'.
              '    background: '.$atts['button_color_hover'].';'.
              '    box-shadow: none;'.
              '    text-shadow: none;'.
              '  }'.
              '</style>'.
              '<div class="linkTextingWidget">'.
              '  <div class="linkTextingInner">'.
              '    <input type="hidden" class="linkID" value="'.$atts['linkid'].'">'.
              '    <div class="linkTextingInputWrapper">'.
              '      <input class="linkTextingInput linkTextingInputFlagAdjust" type="tel" id="numberToText_linkTexting"></input>'.
              '    </div>'.
              '    <button class="linkTextingButton" type="button" id="sendButton_linkTexting">Text me a link</button>'.
              '    <div class="linkTextingError" id="linkTextingError" style="display:none;"></div>'.
              '    <div class="poweredDiv">Powered by <a class="poweredLink" href="https://www.linktexting.com" target="_blank">LinkTexting</a></div>'.
              '  </div>'.
              '</div>';
}

function addStyle() {
       wp_enqueue_style( 'style', plugins_url('/assets/css/link_texting.min.css', __FILE__) );
}

function addScripts() {
       wp_register_script( 'link_texting', plugins_url('/assets/js/link_texting.min.js', __FILE__) );
}

add_action('wp_enqueue_scripts', 'addStyle');
add_action('wp_footer', 'addScripts');
add_shortcode('linktexting', 'linktexting_shortcode');

?>