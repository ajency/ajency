

        var searchOptionsView = Backbone.View.extend({

            el : ".top-dd-c"    ,

            template :'#projectlistSearchOptionsTemplate',

            events : {
                'click .btn_norm'	: 'searchProperties',
                //'click .top_map'    : 'display_map',
                'click .top_list'    : 'searchProperties',
                'change .srchopt'   :  'searchProperties',
                'change #dd_city'   :  'load_locality_options'


            },

            initialize : function(args) {
                _.bindAll(this ,'render','searchProperties','display_map');
               /*  _.bindAll(this ,'renderForm'); */





                var self = this;

                if(_.isUndefined(getAppInstance().searchOptions)){
                    jQuery.ajax(AJAXURL,{
                        type: 'GET',
                        action:'get_search_options',
                        data :{action:'get_search_options'},
                        complete: function() {

                        },
                        success: function(response) {

                            getAppInstance().searchOptions = response ;

                            self.load_display_properties();
                        },
                        error: function(){

                        },

                        dataType: 'json'
                    });
                }
                else{
                    self.load_display_properties();
                }












            },



    load_display_properties :function function_name (argument) {

                    var self = this;

                        if(jQuery('#dd_status').length<=0){
                            var template = _.template(jQuery(self.template).html());
                            jQuery('.top-dd-c').html(template({data : getAppInstance().searchOptions}));
                        }


                        if(_.isUndefined(getAppInstance().residentialPropertyCollection ) || getAppInstance().residentialPropertyCollection.length <0){
                        getAppInstance().residentialPropertyCollection = new ResidentialPropertiesCollection();
                        getAppInstance().residentialPropertyCollection.fetch({
                            success: function(collection) { // the fetched collection!


                                 if(!_.isUndefined(getAppInstance().mainView.mapview) && getAppInstance().mainView.mapview==true){
                                     jQuery('.top_map').addClass('current');

                                    jQuery('.top_list').removeClass('current')

                                    self.display_map();
                                }
                                else{

                                     jQuery('.top_list').addClass('current');

                                    jQuery('.top_map').removeClass('current')

                                    if(_.isUndefined(getAppInstance().projectlistView ))
                                        getAppInstance().projectlistView = new projectsListingsView();
                                    else
                                        self.searchProperties()
                                }


                            },
                            error: function(){

                            },

                            dataType: 'json'
                        });
                    }
                    else{

                         if (!_.isUndefined(getAppInstance().mainView.mapview) && getAppInstance().mainView.mapview==true){
                                     jQuery('.top_map').addClass('current');

                                    jQuery('.top_map').removeClass('current')
                                    self.display_map();
                                }

                                else{

                                    if(_.isUndefined(getAppInstance().projectlistView ))
                                        getAppInstance().projectlistView = new projectsListingsView();
                                    else
                                        self.searchProperties()
                                }

                    }


    },




   display_map : function(){
                console.log('display map');;

                jQuery('.top_map').addClass('current');
                jQuery('.top_list').removeClass('current')

              //  var properties = getAppInstance().residentialPropertyCollection.toJSON();


                var prop_status = jQuery('#dd_status').val();
                var prop_city = jQuery('#dd_city').val();
                var prop_locality = jQuery('#dd_locality').val();
                var prop_type = jQuery('#dd_type').val();

                var search_options = {};
                if(prop_status!='')
                   search_options['property_status'] =  prop_status;

                 if(prop_city!='')
                                   search_options['property_city'] =  prop_city;

                 if(prop_locality!='')
                                   search_options['property_locaity'] =  prop_locality;

                 if(prop_type!='')
                                   search_options['property_type'] =  prop_type;



                var res_collection = getAppInstance().residentialPropertyCollection  ;

                 // var search_collections = res_collection.where({ property_status: prop_status});


                /*var search_collections = res_collection.where({'property_status':prop_status,
                                        'property_city':prop_city,
                                        'property_locaity': prop_locality,
                                        'property_type':prop_type
                                          }) */

                var search_collections = res_collection.models;

                if( (prop_status!='') || (prop_city!='') || (prop_locality!='') || (prop_type!='') )
                    var search_collections = res_collection.where(search_options )


                var properties = search_collections;
                console.log('properties:----------map')
                console.log(properties)

                var marker_image = SITEURL+'/wp-content/themes/samba-child/img/map_pin_selected.png';

                var infowindow = new google.maps.InfoWindow();

                var marker, i;


                if(properties.length>0){


                    for (i = 0; i < properties.length; i++) {


                        locations = properties[i].get('map_address')[0];

                        jQuery('#projects_listings').css({'display':'block',
                                   'width' :'100%',
                                   'height' : 'auto',
                                   'min-height':'400px'

                                })

                        if(i==0){

                            var map = new google.maps.Map(document.getElementById('projects_listings'), {
                                zoom:8,
                                center: new google.maps.LatLng(locations.lat, locations.lng),
                                mapTypeId: google.maps.MapTypeId.ROADMAP

                            });

                        }


                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations.lat, locations.lng),
                            map: map,
                            icon :  marker_image
                        });

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {

                      /*       var popup_content = "<table cellpadding='0' cellspacing='0' border='0' ><tr><td>"+
                       "<img src='"+properties[i].get('featured_image')+"' width='60' /></td><td><b>"+properties[i].get('post_title')
                       +" </b> |  "+properties[i].get('property_locaity')+" "+properties[i].get('property_city')+" <br/>"+properties[i].get('property_type')+"</td></tr>";

                        */


            circle = new google.maps.Circle({
              map: map,
              fillColor : '#BBD8E9',
              fillOpacity : 0.3,
              radius : 60000,
              strokeColor : '#BBD8E9',
              strokeOpacity : 0.9,
              strokeWeight : 2,
            });

            // console.log(circle);

            circle.bindTo('center', marker, 'position');


            showHideCircle(map, circle);


            function showHideCircle(map, circle) {
              google.maps.event.addListener(circle, 'mouseout', function() {
                circle.setOptions({
                  fillOpacity: 0,
                  strokeOpacity: 0
                });
              });
              google.maps.event.addListener(circle, 'mouseover', function() {
                circle.setOptions({
                  fillOpacity: 0.35,
                  strokeOpacity: 0.3
                });
              });
            }

            google.maps.event.addListener(infowindow, 'domready', function() {
              jQuery('.gm-style-iw').each(function() {
                var iwOuter = jQuery(this);
                var iwBackground = iwOuter.prev();
                // Remove the background shadow DIV
                iwBackground.children(':nth-child(2)').css({'display' : 'none'});
                // Remove the white background DIV
                iwBackground.children(':nth-child(4)').css({'display' : 'none'});
                // Moves the infowindow 115px to the right. because after
                //applying styles and all, the arrow and close btn do not position properly
                iwOuter.parent().parent().css({left: '115px'});
                // Moves the shadow of the arrow 76px to the left margin
                iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
                // Moves the arrow 76px to the left margin
                iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
                // Changes the desired color for the tail outline.
                // The outline of the tail is composed of two descendants of div which contains the tail.
                // The .find('div').children() method refers to all the div which are direct descendants of the previous div.
                iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(0, 0, 0, 0.2) 0px 1px 6px', 'z-index' : '1'});
                // Taking advantage of the already established reference to
                // div .gm-style-iw with iwOuter variable.
                // You must set a new variable iwCloseBtn.
                // Using the .next() method of JQuery you reference the following div to .gm-style-iw.
                // Is this div that groups the close button elements.
                var iwCloseBtn = iwOuter.next();

                // Apply the desired effect to the close button
                iwCloseBtn.css({
                  width: '27px',
                  height: '27px',
                  opacity: '0.5', // by default the close button has an opacity of 0.7
                  right: '38px', top: '3px', // button repositioning
                  border: '7px solid rgb(255, 255, 255)', // increasing button border and new color
                  'border-radius': '13px', // circular effect
                  'box-shadow': 'rgba(0, 0, 0, 0.298039) 0px 0px 5px' // 3D effect to highlight the button
                  });

                // The API automatically applies 0.7 opacity to the button after the mouseout event.
                // This function reverses this event to the desired value.
                jQuery(this).mouseover(function(){
                  iwCloseBtn.css({opacity: '1'});
                });
                jQuery(this).mouseout(function(){
                  iwCloseBtn.css({opacity: '0.5'});
                });
              });
            });

                    var featured_img_thumbnail = properties[i].get('featured_image_thumbnail');


                    var popup_content ='<div class="map_info_c  draggable"    property-id="'+properties[i].get('id')+'" property-title = "'+properties[i].get('post_title')+'" property-address="'+properties[i].get('property_locaity')+' '+properties[i].get('property_city')+'">'+
                                       '                  <div class="img_cont">'+
                                            '<a href="#" class="img_link">'+
                                                '<img src="'+featured_img_thumbnail[0]+'" alt="" class="pull-left map_fi">'+
                                           ' </a>'+
                                        '</div>'+
                                        '<div class="map_info "       >'+
                                            '<a href="#" class="map_p_title">'+
                                                '<span class="single_p_title">'+properties[i].get('post_title')+'</span>'+
                                                '<span class="single_p_light">|</span>'+
                                                '<span class="single_p_location">'+properties[i].get('property_locaity')+' '+properties[i].get('property_city')+'</span>'+
                                            '</a>'+
                                            '<p class="map_excerpt">'+
                                            properties[i].get('property_type')+
                                            '</p>'+
                                            ' <!-- <p class="map_p_cost">'+
                                            '    INR 2.2 CR +'+
                                            '</p> --> '+
                                            '<div class="map_btm">'+
                                            '    <div class="pull-left">'+
                                            '       <a href="#" class="btn_norm single_enq"><i class="fa fa-envelope-o"></i></a>'+
                                            '      <a href="#" class="btn_norm single_share"><i class="fa fa-share-alt"></i></a>'+
                                            '        <a href="#" class="btn_norm single_compare"></a>'+
                                            '    </div>'+
                                            '    <div class="pull-right">'+
                                            '        <a href="'+properties[i].get('post_url')+'" class="btn_norm single_know">'+
                                            '            <i class="fa fa-angle-right"></i>'+
                                            '        </a>'+
                                            '    </div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'





                      infowindow.setContent(popup_content);
                      infowindow.open(map, marker);

                        if(jQuery(".draggable").length>0){
                                console.log('draggable')
                                jQuery(".draggable").draggable({ cursor: "crosshair",  revert:"invalid",helper:"clone",


                                start: function(event, ui) {
                                    ui.helper.css({ height: 'auto', width: '300px' });
                                },
                                stop: function(event, ui) {
                                    ui.helper.css({ height: 'auto', width: '300px' });
                                }

                            });
                        }
                        else{
                            console.log('no dragables')
                        }


                    }
                  })(marker, i));
                }
        }
        else{

            jQuery('#projects_listings').html('<p class="no_props">No Properties to display!</p>');
        }

            },


            /**
             * Render the view
             * @param  {[type]} evt [description]
             * @return {[type]}     [description]
             */
            render : function(evt) {

                console.log('render getAppInstance().searchOptions');
                console.log(getAppInstance().searchOptions)

                 var self =this;

                                var template = _.template(jQuery(self.template).html());

                                jQuery('.top-dd-c').html(template({data : getAppInstance().searchOptions}));

                                var projectlistView = new projectsListingsView();


                return this;
            },

            searchProperties: function(evt){




               console.log('searchProperties') ;


                var prop_status = jQuery('#dd_status').val();
                var prop_city = jQuery('#dd_city').val();
                var prop_locality = jQuery('#dd_locality').val();
                var prop_type = jQuery('#dd_type').val();

                var search_options = {};
                if(prop_status!='')
                   search_options['property_status'] =  prop_status;

                 if(prop_city!='')
                                   search_options['property_city'] =  prop_city;

                 if(prop_locality!='')
                                   search_options['property_locaity'] =  prop_locality;

                 if(prop_type!='')
                                   search_options['property_type'] =  prop_type;



                var res_collection = getAppInstance().residentialPropertyCollection  ;

                 // var search_collections = res_collection.where({ property_status: prop_status});


                /*var search_collections = res_collection.where({'property_status':prop_status,
                                        'property_city':prop_city,
                                        'property_locaity': prop_locality,
                                        'property_type':prop_type
                                          }) */

                var search_collections = res_collection.models;

                if( (prop_status!='') || (prop_city!='') || (prop_locality!='') || (prop_type!='') )
                    var search_collections = res_collection.where(search_options )

                /* var projectListingsTemplate2 = _.template(jQuery('#spn_propertieslistings').html());

                                                jQuery('#proj_list').html(projectListingsTemplate2({propertiesdata : search_collections}));
                */

                /*var template2 = _.template(jQuery('#spn_propertieslistings').html(), {propertiesdata : search_collections});
                console.log(template2);
                jQuery("#proj_list").html(template2);*/
            jQuery('#projects_listings').attr('style','')





                 //if( (!_.isUndefined(getAppInstance().mainView.mapview) && getAppInstance().mainView.mapview==true)  || (jQuery(evt.target).hasClass('top_list')==false && jQuery('.top_map').hasClass('current'))     ||  (jQuery(evt.target).hasClass('top_map') ) ){
                    if( !_.isUndefined(getAppInstance().mainView.mapview) && getAppInstance().mainView.mapview==true) {
                    jQuery('.top_map').addClass('current');
                    jQuery('.top_map').removeClass('current')
                    this.display_map();
                }
               // if(jQuery(evt.target).hasClass('top_list') || (jQuery(evt.target).hasClass('top_map') ==false && jQuery('.top_map').hasClass('current') == false)){
                if( _.isUndefined(getAppInstance().mainView.mapview) || getAppInstance().mainView.mapview==false) {
                    jQuery('.top_list').addClass('current');
                    jQuery('.top_map').removeClass('current')

                     var projectListingsTemplate2 = _.template(jQuery('#spn_propertieslistings').html());

                 jQuery('#projects_listings').html(projectListingsTemplate2({propertiesdata : search_collections}));











        if(jQuery(".draggable").length>0){
            console.log('draggable')
            jQuery(".draggable").draggable({ cursor: "crosshair",  revert:"invalid",helper:"clone",


    start: function(event, ui) {
        ui.helper.css({ height: 'auto', width: '300px' });
    },
    stop: function(event, ui) {
        ui.helper.css({ height: 'auto', width: '300px' });
    }


        });
        }
        else{
            console.log('no dragables')
        }

        /*this.mainView.make_div_dropable2(".drag_area")





        if(jQuery(".draggable").length>0){
            console.log('draggable')
            jQuery(".draggable").draggable({ cursor: "crosshair",  revert:"invalid",helper:"clone",


         start: function(event, ui) {
                ui.helper.css({ height: 'auto', width: '300px' });
            },
            stop: function(event, ui) {
                ui.helper.css({ height: 'auto', width: '300px' });
            }


        });
        } */







                }





            },

            load_locality_options : function(evt){

                var event_val = jQuery(evt.target).val();

                console.log('load_locality_options')
                console.log(getAppInstance().searchOptions)

                            _.each(getAppInstance().searchOptions['citylocality'], function(vl,ky){

console.log(ky)
console.log('jQuery(evt.target).val()'+event_val)
                                if(ky==event_val){
                                    jQuery('#dd_locality').empty();
                                    jQuery('#dd_locality').append("<option value=''>Select</option>")
                                    _.each(vl,function(v,k){

                                        jQuery('#dd_locality').append("<option value='"+v+"'>"+v+"</option>")

                                    })

                                }
                            })

            }

















        });

/*        return SiteProfileView;

    }); */