<?php


//include tabs js
wp_enqueue_script('jquery-ui-tabs');

$nd_booking_paypal_enable = get_option('nd_booking_paypal_enable'); 
if ( $nd_booking_paypal_enable == 1 and get_option('nicdark_theme_author') == 1 ) { }else{ $nd_booking_shortcode_right_content .= '<style>#nd_booking_p_payment,#nd_booking_checkout_payment_4_tab { display:none; }</style>'; }
$nd_booking_booking_request_enable = get_option('nd_booking_booking_request_enable'); 
if ( $nd_booking_booking_request_enable == 1 and get_option('nicdark_theme_author') == 1 ) { }else{ $nd_booking_shortcode_right_content .= '<style>#nd_booking_br_payment,#nd_booking_checkout_payment_1_tab { display:none; }</style>'; }
$nd_booking_payment_on_arrive_enable = get_option('nd_booking_payment_on_arrive_enable'); 
if ( $nd_booking_payment_on_arrive_enable == 1 and get_option('nicdark_theme_author') == 1 ) { }else{ $nd_booking_shortcode_right_content .= '<style>#nd_booking_poa_payment,#nd_booking_checkout_payment_3_tab { display:none; }</style>'; }

$nd_booking_shortcode_right_content .= '

    <script type="text/javascript">
    <!--//--><![CDATA[//><!--
        jQuery(document).ready(function($) {
            $(".nd_booking_tabs").tabs();
        });
    //--><!]]>
    </script>

    <style>
        #nd_booking_checkout_payment_tab_list li.ui-state-active a { font-weight:bolder; }
    </style>
        
    <div class="nd_booking_section nd_booking_height_40"></div>
    <div class="nd_booking_section nd_booking_height_2 nd_booking_bg_grey"></div>
    <div class="nd_booking_section nd_booking_height_40"></div>
    

    <h1>'.__('Payment Options','nd-booking').' :</h1>
    <div class="nd_booking_section nd_booking_height_30"></div>

    
    <!--START Tabs-->
    <div class="nd_booking_tabs nd_booking_section">

        <ul id="nd_booking_checkout_payment_tab_list" class="nd_booking_list_style_none nd_booking_margin_0 nd_booking_padding_0 nd_booking_section">

            <li id="nd_booking_bt_payment" class="nd_booking_display_inline_block nd_booking_margin_right_30">
                <h4>
                    <a class="nd_booking_outline_0 nd_booking_padding_10_0 nd_booking_letter_spacing_2 nd_booking_font_weight_lighter nd_booking_font_size_14 nd_booking_display_inline_block nd_options_second_font nd_options_color_greydark" href="#nd_booking_checkout_payment_2_tab">'.__('BANK TRANSFER','nd-booking').'</a>
                </h4>
            </li>

            <li id="nd_booking_p_payment" class="nd_booking_display_inline_block nd_booking_margin_right_30">
                <h4>
                    <a class="nd_booking_outline_0 nd_booking_padding_10_0 nd_booking_letter_spacing_2 nd_booking_font_weight_lighter nd_booking_font_size_14 nd_booking_display_inline_block nd_options_second_font nd_options_color_greydark" href="#nd_booking_checkout_payment_4_tab">'.__('PAYPAL','nd-booking').'</a>
                </h4>
            </li>

            <li id="nd_booking_poa_payment" class="nd_booking_display_inline_block nd_booking_margin_right_30">
                <h4>
                    <a class="nd_booking_outline_0 nd_booking_padding_10_0 nd_booking_letter_spacing_2 nd_booking_font_weight_lighter nd_booking_font_size_14 nd_booking_display_inline_block nd_options_second_font nd_options_color_greydark" href="#nd_booking_checkout_payment_3_tab">'.__('PAYMENT ON ARRIVE','nd-booking').'</a>
                </h4>
            </li>

            <li id="nd_booking_br_payment" class="nd_booking_display_inline_block nd_booking_margin_right_30">
                <h4>
                    <a class="nd_booking_outline_0 nd_booking_padding_10_0 nd_booking_letter_spacing_2 nd_booking_font_weight_lighter nd_booking_font_size_14 nd_booking_display_inline_block nd_options_second_font nd_options_color_greydark" href="#nd_booking_checkout_payment_1_tab">'.__('BOOKING REQUEST','nd-booking').'</a>
                </h4>
            </li>

        </ul>

        <div class="nd_booking_section nd_booking_height_20"></div>

        <div class="nd_booking_section" id="nd_booking_checkout_payment_1_tab">
            
            '.do_shortcode(get_option('nd_booking_booking_request_message_checkout')).'

            <div class="nd_booking_section nd_booking_height_20"></div>

            <form action="'.nd_booking_checkout_page().'" method="post">
                <input type="hidden" id="nd_booking_form_checkout_arrive" name="nd_booking_form_checkout_arrive" value="1">

                <input type="hidden" id="nd_booking_checkout_form_date_from" name="nd_booking_checkout_form_date_from" value="'.$nd_booking_booking_form_date_from.'">
                <input type="hidden" id="nd_booking_checkout_form_date_top" name="nd_booking_checkout_form_date_top" value="'.$nd_booking_booking_form_date_to.'">
                <input type="hidden" id="nd_booking_checkout_form_guests" name="nd_booking_checkout_form_guests" value="'.$nd_booking_booking_form_guests.'">
                <input type="hidden" id="nd_booking_checkout_form_final_price" name="nd_booking_checkout_form_final_price" value="'.$nd_booking_booking_form_final_price.'">
                <input type="hidden" id="nd_booking_checkout_form_post_id" name="nd_booking_checkout_form_post_id" value="'.$nd_booking_booking_form_post_id.'">
                <input type="hidden" id="nd_booking_checkout_form_post_title" name="nd_booking_checkout_form_post_title" value="'.$nd_booking_booking_form_post_title.'">

                <input type="hidden" id="nd_booking_checkout_form_name" name="nd_booking_checkout_form_name" value="'.$nd_booking_booking_form_name.'">
                <input type="hidden" id="nd_booking_checkout_form_surname" name="nd_booking_checkout_form_surname" value="'.$nd_booking_booking_form_surname.'">
                <input type="hidden" id="nd_booking_checkout_form_email" name="nd_booking_checkout_form_email" value="'.$nd_booking_booking_form_email.'">
                <input type="hidden" id="nd_booking_checkout_form_phone" name="nd_booking_checkout_form_phone" value="'.$nd_booking_booking_form_phone.'">
                <input type="hidden" id="nd_booking_checkout_form_address" name="nd_booking_checkout_form_address" value="'.$nd_booking_booking_form_address.'">
                <input type="hidden" id="nd_booking_checkout_form_city" name="nd_booking_checkout_form_city" value="'.$nd_booking_booking_form_city.'">
                <input type="hidden" id="nd_booking_checkout_form_country" name="nd_booking_checkout_form_country" value="'.$nd_booking_booking_form_country.'">
                <input type="hidden" id="nd_booking_checkout_form_zip" name="nd_booking_checkout_form_zip" value="'.$nd_booking_booking_form_zip.'">
                <input type="hidden" id="nd_booking_checkout_form_requets" name="nd_booking_checkout_form_requets" value="'.$nd_booking_booking_form_requests.'">
                <input type="hidden" id="nd_booking_checkout_form_arrival" name="nd_booking_checkout_form_arrival" value="'.$nd_booking_booking_form_arrival.'">
                <input type="hidden" id="nd_booking_checkout_form_coupon" name="nd_booking_checkout_form_coupon" value="'.$nd_booking_booking_form_coupon.'">
                <input type="hidden" id="nd_booking_checkout_form_term" name="nd_booking_checkout_form_term" value="'.$nd_booking_booking_form_term.'">
                <input type="hidden" id="nd_booking_booking_form_services" name="nd_booking_booking_form_services" value="'.$nd_booking_booking_form_services.'">

                <input type="hidden" id="nd_booking_booking_form_action_type" name="nd_booking_booking_form_action_type" value="booking_request">
                <input type="hidden" id="nd_booking_booking_form_payment_status" name="nd_booking_booking_form_payment_status" value="Pending">

                <input class="nd_booking_font_size_11 nd_options_second_font_important nd_booking_font_weight_bold nd_booking_letter_spacing_2 nd_booking_padding_15_35_important" type="submit" id="" name="" value="'.__('SEND REQUEST','nd-booking').'">
            </form>


        </div>




        <div class="nd_booking_section" id="nd_booking_checkout_payment_2_tab">
            
            '.do_shortcode(get_option('nd_booking_bank_transfer_message_checkout')).'

            <div class="nd_booking_section nd_booking_height_20"></div>

            <form action="'.nd_booking_checkout_page().'" method="post">
                <input type="hidden" id="nd_booking_form_checkout_arrive" name="nd_booking_form_checkout_arrive" value="1">

                <input type="hidden" id="nd_booking_checkout_form_date_from" name="nd_booking_checkout_form_date_from" value="'.$nd_booking_booking_form_date_from.'">
                <input type="hidden" id="nd_booking_checkout_form_date_top" name="nd_booking_checkout_form_date_top" value="'.$nd_booking_booking_form_date_to.'">
                <input type="hidden" id="nd_booking_checkout_form_guests" name="nd_booking_checkout_form_guests" value="'.$nd_booking_booking_form_guests.'">
                <input type="hidden" id="nd_booking_checkout_form_final_price" name="nd_booking_checkout_form_final_price" value="'.$nd_booking_booking_form_final_price.'">
                <input type="hidden" id="nd_booking_checkout_form_post_id" name="nd_booking_checkout_form_post_id" value="'.$nd_booking_booking_form_post_id.'">
                <input type="hidden" id="nd_booking_checkout_form_post_title" name="nd_booking_checkout_form_post_title" value="'.$nd_booking_booking_form_post_title.'">

                <input type="hidden" id="nd_booking_checkout_form_name" name="nd_booking_checkout_form_name" value="'.$nd_booking_booking_form_name.'">
                <input type="hidden" id="nd_booking_checkout_form_surname" name="nd_booking_checkout_form_surname" value="'.$nd_booking_booking_form_surname.'">
                <input type="hidden" id="nd_booking_checkout_form_email" name="nd_booking_checkout_form_email" value="'.$nd_booking_booking_form_email.'">
                <input type="hidden" id="nd_booking_checkout_form_phone" name="nd_booking_checkout_form_phone" value="'.$nd_booking_booking_form_phone.'">
                <input type="hidden" id="nd_booking_checkout_form_address" name="nd_booking_checkout_form_address" value="'.$nd_booking_booking_form_address.'">
                <input type="hidden" id="nd_booking_checkout_form_city" name="nd_booking_checkout_form_city" value="'.$nd_booking_booking_form_city.'">
                <input type="hidden" id="nd_booking_checkout_form_country" name="nd_booking_checkout_form_country" value="'.$nd_booking_booking_form_country.'">
                <input type="hidden" id="nd_booking_checkout_form_zip" name="nd_booking_checkout_form_zip" value="'.$nd_booking_booking_form_zip.'">
                <input type="hidden" id="nd_booking_checkout_form_requets" name="nd_booking_checkout_form_requets" value="'.$nd_booking_booking_form_requests.'">
                <input type="hidden" id="nd_booking_checkout_form_arrival" name="nd_booking_checkout_form_arrival" value="'.$nd_booking_booking_form_arrival.'">
                <input type="hidden" id="nd_booking_checkout_form_coupon" name="nd_booking_checkout_form_coupon" value="'.$nd_booking_booking_form_coupon.'">
                <input type="hidden" id="nd_booking_checkout_form_term" name="nd_booking_checkout_form_term" value="'.$nd_booking_booking_form_term.'">
                <input type="hidden" id="nd_booking_booking_form_services" name="nd_booking_booking_form_services" value="'.$nd_booking_booking_form_services.'">

                <input type="hidden" id="nd_booking_booking_form_action_type" name="nd_booking_booking_form_action_type" value="bank_transfer">
                <input type="hidden" id="nd_booking_booking_form_payment_status" name="nd_booking_booking_form_payment_status" value="Pending Payment">

                <input class="nd_booking_font_size_11 nd_options_second_font_important nd_booking_font_weight_bold nd_booking_letter_spacing_2 nd_booking_padding_15_35_important" type="submit" id="" name="" value="'.__('BOOK NOW','nd-booking').'">
            </form>


        </div>




        <div class="nd_booking_section" id="nd_booking_checkout_payment_3_tab">
            
            '.do_shortcode(get_option('nd_booking_payment_on_arrive_message_checkout')).'

            <div class="nd_booking_section nd_booking_height_20"></div>

            <form action="'.nd_booking_checkout_page().'" method="post">
                <input type="hidden" id="nd_booking_form_checkout_arrive" name="nd_booking_form_checkout_arrive" value="1">

                <input type="hidden" id="nd_booking_checkout_form_date_from" name="nd_booking_checkout_form_date_from" value="'.$nd_booking_booking_form_date_from.'">
                <input type="hidden" id="nd_booking_checkout_form_date_top" name="nd_booking_checkout_form_date_top" value="'.$nd_booking_booking_form_date_to.'">
                <input type="hidden" id="nd_booking_checkout_form_guests" name="nd_booking_checkout_form_guests" value="'.$nd_booking_booking_form_guests.'">
                <input type="hidden" id="nd_booking_checkout_form_final_price" name="nd_booking_checkout_form_final_price" value="'.$nd_booking_booking_form_final_price.'">
                <input type="hidden" id="nd_booking_checkout_form_post_id" name="nd_booking_checkout_form_post_id" value="'.$nd_booking_booking_form_post_id.'">
                <input type="hidden" id="nd_booking_checkout_form_post_title" name="nd_booking_checkout_form_post_title" value="'.$nd_booking_booking_form_post_title.'">

                <input type="hidden" id="nd_booking_checkout_form_name" name="nd_booking_checkout_form_name" value="'.$nd_booking_booking_form_name.'">
                <input type="hidden" id="nd_booking_checkout_form_surname" name="nd_booking_checkout_form_surname" value="'.$nd_booking_booking_form_surname.'">
                <input type="hidden" id="nd_booking_checkout_form_email" name="nd_booking_checkout_form_email" value="'.$nd_booking_booking_form_email.'">
                <input type="hidden" id="nd_booking_checkout_form_phone" name="nd_booking_checkout_form_phone" value="'.$nd_booking_booking_form_phone.'">
                <input type="hidden" id="nd_booking_checkout_form_address" name="nd_booking_checkout_form_address" value="'.$nd_booking_booking_form_address.'">
                <input type="hidden" id="nd_booking_checkout_form_city" name="nd_booking_checkout_form_city" value="'.$nd_booking_booking_form_city.'">
                <input type="hidden" id="nd_booking_checkout_form_country" name="nd_booking_checkout_form_country" value="'.$nd_booking_booking_form_country.'">
                <input type="hidden" id="nd_booking_checkout_form_zip" name="nd_booking_checkout_form_zip" value="'.$nd_booking_booking_form_zip.'">
                <input type="hidden" id="nd_booking_checkout_form_requets" name="nd_booking_checkout_form_requets" value="'.$nd_booking_booking_form_requests.'">
                <input type="hidden" id="nd_booking_checkout_form_arrival" name="nd_booking_checkout_form_arrival" value="'.$nd_booking_booking_form_arrival.'">
                <input type="hidden" id="nd_booking_checkout_form_coupon" name="nd_booking_checkout_form_coupon" value="'.$nd_booking_booking_form_coupon.'">
                <input type="hidden" id="nd_booking_checkout_form_term" name="nd_booking_checkout_form_term" value="'.$nd_booking_booking_form_term.'">
                <input type="hidden" id="nd_booking_booking_form_services" name="nd_booking_booking_form_services" value="'.$nd_booking_booking_form_services.'">

                <input type="hidden" id="nd_booking_booking_form_action_type" name="nd_booking_booking_form_action_type" value="payment_on_arrive">
                <input type="hidden" id="nd_booking_booking_form_payment_status" name="nd_booking_booking_form_payment_status" value="Pending Payment">

                <input class="nd_booking_font_size_11 nd_options_second_font_important nd_booking_font_weight_bold nd_booking_letter_spacing_2 nd_booking_padding_15_35_important" type="submit" id="" name="" value="'.__('BOOK NOW','nd-booking').'">
            </form>


        </div>




        <div class="nd_booking_section" id="nd_booking_checkout_payment_4_tab">';

            //recover datas from plugin settings
            $nd_booking_paypal_email = get_option('nd_booking_paypal_email');
            $nd_booking_paypal_currency = get_option('nd_booking_paypal_currency');
            $nd_booking_paypal_token = get_option('nd_booking_paypal_token');

            $nd_booking_paypal_developer = get_option('nd_booking_paypal_developer');
            if ( $nd_booking_paypal_developer == 1) {
              $nd_booking_paypal_action_1 = 'https://www.sandbox.paypal.com/cgi-bin';
              $nd_booking_paypal_action_2 = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
            }
            else{  
              $nd_booking_paypal_action_1 = 'https://www.paypal.com/cgi-bin';
              $nd_booking_paypal_action_2 = 'https://www.paypal.com/cgi-bin/webscr';
            }


            //START check if user is logged
            if ( is_user_logged_in() == 1 ) {
                $nd_booking_current_user = wp_get_current_user();
                $nd_booking_current_user_id = $nd_booking_current_user->ID;
            }else{
                $nd_booking_current_user_id = 0;  
            }
            //END check if user is logged
            

            $nd_booking_shortcode_right_content .= '

            '.do_shortcode(get_option('nd_booking_paypal_message_checkout')).'

            <div class="nd_booking_section nd_booking_height_20"></div>

            <form target="paypal" action="'.$nd_booking_paypal_action_1.'" method="post" >
                              
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="'.$nd_booking_paypal_email.'">
                <input type="hidden" name="lc" value="">
                <input type="hidden" name="item_name" value="'.$nd_booking_booking_form_post_title.' '.__('From','nd-booking').' '.$nd_booking_booking_form_date_from.' '.__('To','nd-booking').' '.$nd_booking_booking_form_date_to.'">
                <input type="hidden" name="item_number" value="'.$nd_booking_booking_form_post_id.'">
                <input type="hidden" name="custom" value="'.$nd_booking_booking_form_date_from.'[ndbcpm]'.$nd_booking_booking_form_date_to.'[ndbcpm]'.$nd_booking_booking_form_guests.'[ndbcpm]'.$nd_booking_booking_form_phone.'[ndbcpm]'.$nd_booking_booking_form_arrival.'[ndbcpm]'.$nd_booking_booking_form_services.'[ndbcpm]'.$nd_booking_booking_form_requests.'[ndbcpm]">
                <input type="hidden" name="amount" value="'.$nd_booking_booking_form_final_price.'">
                <input type="hidden" name="currency_code" value="'.$nd_booking_paypal_currency.'">
                <input type="hidden" name="rm" value="2" />
                <input type="hidden" name="return" value="'.nd_booking_checkout_page().'" />
                <input type="hidden" name="cancel_return" value="" />
                <input type="hidden" name="button_subtype" value="services">
                <input type="hidden" name="no_note" value="0">
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
            
                <input class="nd_booking_font_size_11 nd_options_second_font_important nd_booking_font_weight_bold nd_booking_letter_spacing_2 nd_booking_padding_15_35_important" type="submit" id="" name="" value="'.__('PAY NOW','nd-booking').'">

            </form>








        </div>

        

    </div>
    <!--END Tabs-->



';