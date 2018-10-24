<?php
/**
 * Ajency Team Widget Class
 */
class ajency_teamwidget_widget extends WP_Widget {

    /** constructor */
    function ajency_teamwidget_widget() {
        parent::WP_Widget(false, $name = 'Ajency Team Widget');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract( $args );
		    global $wpdb;

        $title = apply_filters('widget_title', $instance['title']); 

        ?>
              <?php echo $before_widget; ?>
                <div class="Center-Block column-7 scroll-indicator-container" id="scr6">
                  <h3 class="grid-title non-bdr">&nbsp;</h3>
                  <div class="col-3">
                     <div class="square-tile aj-live-tile square-tile-mobile5">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2015/12/a-1.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                <span class="metroLarge bottom"> Bootstrapper</span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/0620-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"><!-- Wordpress Weaver --></span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="square-tile aj-live-tile square-tile-mobile5 ">
                           <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                              <div>
                                 <img src="https://ajency.in/wp-content/uploads/2018/09/prasad.jpg" class="is-reponsive">
                              </div>
                              <div>
                                 <div>
                                 <span class="metroLarge bottom"></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>
                     <div class="col-1">
                     <div class="mobile-hidden">
                          <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/0822-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom">Bug Diffuser</span>
                              </div>
                           </div>
                        </div>
                     </div>
                          <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/06e22-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="double-tile aj-live-tile double-tile-mobile">
                        <div id="item5" class=" live-tile" data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div class="yellow">
                              <img src="https://ajency.in/wp-content/uploads/2015/12/a-27.jpg" class="is-reponsive">
                           </div>
                           <div class="yellow bottom-txt">
                              <h1>&#60; insert fancy title here &#62;</h1>
                              <p>Connect on <a href="https://www.linkedin.com/in/anujkhurana">Linkedin</a></p>
                           </div>
                        </div>
                     </div>
                     <div class="mobile-visible">
                         <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/0822-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom">Bug Diffuser</span>
                              </div>
                           </div>
                        </div>
                     </div>
                           <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/06e22-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="square-tile aj-live-tile square-tile-mobile5">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/0520-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="square-tile aj-live-tile square-tile-mobile5">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/02/Fiona.png" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="square-tile aj-live-tile square-tile-mobile5">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/0420-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-1">
                     <div class="double-tile aj-live-tile double-tile-mobile">
                        <div id="item5" class=" live-tile" data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div class="yellow">
                              <img src="https://ajency.in/wp-content/uploads/2015/12/a-28.jpg" class="is-reponsive">
                           </div>
                           <div class="yellow bottom-txt">
                              <h1>&#60; insert co-fancy title here &#62;</h1>
                              <p>Connect on <a href="https://www.linkedin.com/in/avantihiremath">Linkedin</a></p>
                           </div>
                        </div>
                     </div>
                        <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2015/12/a-23.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom">Code Crafter</span>
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="square-tile aj-live-tile square-tile-mobile5">
                           <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                              <div>
                                 <img src="https://ajency.in/wp-content/uploads/2015/12/a-31.jpg" class="is-reponsive">
                              </div>
                              <div>
                                 <div>
                                    <span class="metroLarge bottom">Responsive Rebel </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div> 
               </div>
               <div class="Center-Block column-7 scroll-indicator-container" id="scr6" style="padding-left: 0 !important;">
                  <h3 class="grid-title non-bdr mobile-hidden">&nbsp;</h3>
                  <div class="col-3">
                     <div class="square-tile aj-live-tile square-tile-mobile5">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2015/12/a-9.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom">User Friendly Minion</span>
                              </div>
                           </div>
                        </div>
                     </div>
                    <div class="square-tile aj-live-tile square-tile-mobile5">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2015/12/a-11.jpg"class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom">Code Slinger </span>
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="square-tile aj-live-tile square-tile-mobile5">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2015/12/a-19.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                  <span class="metroLarge bottom">Hack Slash</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                   <div class="col-3">
                          <div class="square-tile aj-live-tile square-tile-mobile5">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2015/12/a-36.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                  <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/10/Latesh-aj.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom">Who's Next ?</span>
                              </div>
                           </div>
                        </div>
                     </div>
                 
                     <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/0522-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
         
                  <div class="col-3">
                    <!--   <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/team/ateam.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                              </div>
                           </div>
                        </div>
                     </div> -->
                   <div class="square-tile aj-live-tile square-tile-mobile5">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/10/Georgio-aj.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                  <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                            <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2017/01/a-37.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                    <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/0120-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                              <span class="metroLarge bottom">The Brogrammer</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                           <div class="col-1">
                     <div class="mobile-hidden">
                        <div class="square-tile aj-live-tile square-tile-mobile5">
                           <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                              <div>
                                 <img src="https://ajency.in/wp-content/uploads/2015/12/a-21.jpg" class="is-reponsive">
                              </div>
                              <div>
                                 <div>
                                    <span class="metroLarge bottom">Css Ninja</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="square-tile aj-live-tile square-tile-mobile5 ">
                           <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                              <div>
                                 <img src="https://ajency.in/wp-content/uploads/2018/03/0422-03-2018.jpg" class="is-reponsive">
                              </div>
                              <div>
                                 <div>
                                    <span class="metroLarge bottom">Dynamic Model</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="double-tile aj-live-tile double-tile-mobile">
                        <div id="item5" class=" live-tile" data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div class="yellow">
                              <img src="https://ajency.in/wp-content/uploads/2015/12/a-29.jpg" class="is-reponsive">
                           </div>
                           <div class="yellow bottom-txt">
                              <h1>Mouse Artist</h1>
                             <!--  <p>Connect on <a href="https://www.linkedin.com/in/anujkhurana">Linkedin</a></p> -->
                           </div>
                        </div>
                     </div>
                     <div class="mobile-visible">
                        <div class="square-tile aj-live-tile square-tile-mobile5">
                           <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                              <div>
                                 <img src="https://ajency.in/wp-content/uploads/2015/12/a-21.jpg" class="is-reponsive">
                              </div>
                              <div>
                                 <div>
                                     <span class="metroLarge bottom">Css Ninja</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="square-tile aj-live-tile square-tile-mobile5 ">
                           <div id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                              <div>
                                 <img src="https://ajency.in/wp-content/uploads/2018/03/0422-03-2018.jpg" class="is-reponsive">
                              </div>
                              <div>
                                 <div>
                                 <span class="metroLarge bottom">Dynamic Model</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-3">
                     <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/0722-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                       <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/10/Rohan-aj.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2017/05/a-55.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
              <div class="Center-Block col-3 scroll-indicator-container" id="scr6">
                  <h3 class="grid-title non-bdr mobile-hidden" style="margin: 2.845px;">&nbsp;</h3>
                  <div class="col-3">
                     <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/03/0320-03-2018.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                        <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="https://ajency.in/wp-content/uploads/2018/04/aj0023.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                 
                      <div class="square-tile aj-live-tile square-tile-mobile5 ">
                        <div  id="item5" class="live-tile " data-delay="1000" data-play-onhover="true" data-start-now="false" data-repeat="0" data-bounce="true" data-direction="vertical">
                           <div>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/no-image.jpg" class="is-reponsive">
                           </div>
                           <div>
                              <div>
                                 <span class="metroLarge bottom">Mail us at <a href="mailto:workwithus@ajency.in">workwithus<br>@ajency.in.</a></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                </div>
                   
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	

        $title = esc_attr($instance['title']);

        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <?php
    }

} // class 
add_action('widgets_init', create_function('', 'return register_widget("ajency_teamwidget_widget");'));