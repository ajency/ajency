(function() {

jQuery(function(){

    jQuery('.tab-signup').attr('data-modal-id', 'signup-modal');
    // jQuery('.tab-signup').addClass('modal-open');

    jQuery('.slideContainer .size-full').addClass('modal-open').attr('data-modal-id', 'open-img');

    jQuery('.slideContainer .size-full').click(function(){
    	var src = jQuery(this).attr('data-img');
    	jQuery('.add-source').attr('src',src);
    });


    // initialize the plugin

    jQuery('.modal-click').click(function(){
    	var owl = jQuery(".owl-carousel").data('owlCarousel');
    	owl.destroy();

     jQuery(".owl-carousel").owlCarousel({
     	//Basic Speeds
	    slideSpeed : 200,
	    paginationSpeed : 800,
	 
	    //Autoplay
	    autoPlay : false,
	    goToFirst : true,
	    goToFirstSpeed : 1000,
	    items : 1,
	    autoHeight: true,
	    itemsDesktop : [1199,1],
    	itemsDesktopSmall : [980,1],
	    itemsTablet: [768,1],
    	itemsMobile : [479,1],
    	// touchDrag  : false,
     // 	mouseDrag  : false,
	 
	    // Navigation
	    afterAction: aftermovefunc,
	    navigation : true,
	    navigationText : ["",""],
	    pagination : true,
	    paginationNumbers: true
     });

     // Drag event
		function aftermovefunc() {
			var pagnum = jQuery('.owl-pagination .owl-page.active .owl-numbers').text();
			jQuery(".jump-to option[value='" + pagnum + "']").attr("selected","selected");
			if(pagnum == 1){
    			jQuery('.owl-prev').text('Get important stats');
    			jQuery('.owl-next').text('Onboard exhibitors');
    		}
			else if(pagnum == 2){
				jQuery('.owl-prev').text('Customize the expo look');
	    		jQuery('.owl-next').text('Publish content');
			}
			else if(pagnum == 3){
				jQuery('.owl-prev').text('Onboard exhibitors');
	    		jQuery('.owl-next').text('Feature special exhibitors/exhibits');
			}
			else if(pagnum == 4){
				jQuery('.owl-prev').text('Publish content');
	    		jQuery('.owl-next').text('Browse exhibitors and exhibits');
			}
			else if(pagnum == 5){
				jQuery('.owl-prev').text('Feature special exhibitors/exhibits');
	    		jQuery('.owl-next').text('Presenting the exhibits');
			}
			else if(pagnum == 6){
				jQuery('.owl-prev').text('Browse exhibitors and exhibits');
	    		jQuery('.owl-next').text('Interaction');
			}
			else if(pagnum == 7){
				jQuery('.owl-prev').text('Presenting the exhibits');
	    		jQuery('.owl-next').text('Get important stats');
			}
			else if(pagnum == 8){
				jQuery('.owl-prev').text('Interaction');
	    		jQuery('.owl-next').text('Customize the expo look');
			}
		}

     	jQuery(".jump-to option").removeAttr("selected","selected");

		var pagnum = jQuery('.owl-pagination .owl-page.active .owl-numbers').text();
		if(pagnum == 1){
			jQuery('.owl-prev').text('Get important stats');
			jQuery('.owl-next').text('Decide on exhibitor');
		}

    	jQuery('.owl-prev,.owl-next').click(function() {
    		var pagnum = jQuery('.owl-pagination .owl-page.active .owl-numbers').text();
    		jQuery(".jump-to option[value='" + pagnum + "']").attr("selected","selected");
    		if(pagnum == 1){
    			jQuery('.owl-prev').text('Get important stats');
    			jQuery('.owl-next').text('Onboard exhibitors');
    		}
    		if(pagnum == 2){
    			jQuery('.owl-prev').text('Customize the expo look');
    			jQuery('.owl-next').text('Publish content');
    		}
    		if(pagnum == 3){
    			jQuery('.owl-prev').text('Onboard exhibitors');
    			jQuery('.owl-next').text('Feature special exhibitors/exhibits');
    		}
    		if(pagnum == 4){
    			jQuery('.owl-prev').text('Publish content');
    			jQuery('.owl-next').text('Browse exhibitors and exhibits');
    		}
    		if(pagnum == 5){
    			jQuery('.owl-prev').text('Feature special exhibitors/exhibits');
    			jQuery('.owl-next').text('Presenting the exhibits');
    		}
    		if(pagnum == 6){
    			jQuery('.owl-prev').text('Browse exhibitors and exhibits');
    			jQuery('.owl-next').text('Interaction');
    		}
    		if(pagnum == 7){
    			jQuery('.owl-prev').text('Presenting the exhibits');
    			jQuery('.owl-next').text('Get important stats');
    		}
    		if(pagnum == 8){
    			jQuery('.owl-prev').text('Interaction');
    			jQuery('.owl-next').text('Customize the expo look');
    		}
    	});

	    // if (jQuery(window).width() < 500) {
	    // 	jQuery('.owl-prev,.owl-next').text('');
	    // }

    });

	// setInterval(function(){
	//  jQuery(".owl-carousel").each(function(){
	//     jQuery(this).data('owlCarousel').updateVars();
	//  });
	// },1500);
	jQuery('.modal-1').click(function(){
		var owl = jQuery(".owl-carousel").data('owlCarousel');
		owl.goTo(0);
		jQuery(".jump-to option[value=1]").attr("selected","selected");
		jQuery('.owl-prev').text('Get important stats');
    	jQuery('.owl-next').text('Onboard exhibitors');

    });

    jQuery('.modal-2').click(function(){
		var owl = jQuery(".owl-carousel").data('owlCarousel');
		owl.goTo(1);
		jQuery(".jump-to option[value=2]").attr("selected","selected");
		jQuery('.owl-prev').text('Customize the expo look');
    	jQuery('.owl-next').text('Publish content');
    });

    jQuery('.modal-3').click(function(){
		var owl = jQuery(".owl-carousel").data('owlCarousel');
		owl.goTo(2);
		jQuery(".jump-to option[value=3]").attr("selected","selected");
		jQuery('.owl-prev').text('Onboard exhibitors');
    	jQuery('.owl-next').text('Feature special exhibitors/exhibits');
    });

    jQuery('.modal-4').click(function(){
		var owl = jQuery(".owl-carousel").data('owlCarousel');
		owl.goTo(3);
		jQuery(".jump-to option[value=4]").attr("selected","selected");
		jQuery('.owl-prev').text('Publish content');
    	jQuery('.owl-next').text('Browse exhibitors and exhibits');
    });

    jQuery('.modal-5').click(function(){
		var owl = jQuery(".owl-carousel").data('owlCarousel');
		owl.goTo(4);
		jQuery(".jump-to option[value=5]").attr("selected","selected");
		jQuery('.owl-prev').text('Feature special exhibitors/exhibits');
    	jQuery('.owl-next').text('Presenting the exhibits');
    });

    jQuery('.modal-6').click(function(){
		var owl = jQuery(".owl-carousel").data('owlCarousel');
		owl.goTo(5);
		jQuery(".jump-to option[value=6]").attr("selected","selected");
		jQuery('.owl-prev').text('Browse exhibitors and exhibits');
    	jQuery('.owl-next').text('Interaction');
    });

    jQuery('.modal-7').click(function(){
		var owl = jQuery(".owl-carousel").data('owlCarousel');
		owl.goTo(6);
		jQuery(".jump-to option[value=7]").attr("selected","selected");
		jQuery('.owl-prev').text('Presenting the exhibits');
    	jQuery('.owl-next').text('Get important stats');
    });

    jQuery('.modal-8').click(function(){
		var owl = jQuery(".owl-carousel").data('owlCarousel');
		owl.goTo(7);
		jQuery(".jump-to option[value=8]").attr("selected","selected");
		jQuery('.owl-prev').text('Interaction');
    	jQuery('.owl-next').text('Customize the expo look');
    });

    // Select box jump

    jQuery(".jump-to").change(function(){
    	var slideval = jQuery(this).val();
	    var owl = jQuery(".owl-carousel").data('owlCarousel');
		owl.goTo(slideval - 1);		
    	var test = jQuery(".jump-to option[value='" + slideval + "']").outerWidth();
    	console.log(test);
    	// jQuery(".jump-to option").removeAttr("selected","selected");
		jQuery(".jump-to option[value='" + slideval + "']").attr("selected","selected");

		var pagnum = jQuery('.owl-pagination .owl-page.active .owl-numbers').text();
		if(pagnum == 1){
    			jQuery('.owl-prev').text('Get important stats');
    			jQuery('.owl-next').text('Onboard exhibitors');
    		}
		else if(pagnum == 2){
			jQuery('.owl-prev').text('Customize the expo look');
    		jQuery('.owl-next').text('Publish content');
		}
		else if(pagnum == 3){
			jQuery('.owl-prev').text('Onboard exhibitors');
    		jQuery('.owl-next').text('Feature special exhibitors/exhibits');
		}
		else if(pagnum == 4){
			jQuery('.owl-prev').text('Publish content');
    		jQuery('.owl-next').text('Browse exhibitors and exhibits');
		}
		else if(pagnum == 5){
			jQuery('.owl-prev').text('Feature special exhibitors/exhibits');
    		jQuery('.owl-next').text('Presenting the exhibits');
		}
		else if(pagnum == 6){
			jQuery('.owl-prev').text('Browse exhibitors and exhibits');
    		jQuery('.owl-next').text('Interaction');
		}
		else if(pagnum == 7){
			jQuery('.owl-prev').text('Presenting the exhibits');
    		jQuery('.owl-next').text('Get important stats');
		}
		else if(pagnum == 8){
			jQuery('.owl-prev').text('Interaction');
    		jQuery('.owl-next').text('Customize the expo look');
		}

	});

    // Connecting svg

   jQuery(".connect-svg").append('<svg \
   width="537" height="276" viewBox="0 0 537 276" version="1.1" \
<title>illustration_outlined</title>\
<desc>Created using Figma</desc>\
<g id="Canvas" transform="translate(-2341 13)" figma:type="canvas">\
<mask id="mask0_alpha" mask-type="alpha">\
<path d="M 2341 -13L 2878 -13L 2878 263L 2341 263L 2341 -13Z" fill="#FFFFFF"/>\
</mask>\
<g id="illustration_outlined" style="mix-blend-mode:normal;" mask="url(#mask0_alpha)" figma:type="frame">\
<g id="computer2" style="mix-blend-mode:normal;" figma:type="frame">\
<g id="Vector" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path0_fill" transform="translate(2419.5 172.657)" fill="#08415C" style="mix-blend-mode:normal;"/>\
</g>\
</g>\
<g id="illustration" style="mix-blend-mode:normal;" figma:type="frame">\
<g id="bgdots" style="mix-blend-mode:normal;" figma:type="frame">\
<g id="bg" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path1_fill" transform="translate(2590.13 -0.256023)" fill="#F2F2F2" style="mix-blend-mode:normal;"/>\
</g>\
<g id="bg" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path2_fill" transform="translate(2800.32 75.6942)" fill="#F2F2F2" style="mix-blend-mode:normal;"/>\
</g>\
<g id="bg" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path3_fill" transform="translate(2550.79 2.23339)" fill="#F2F2F2" style="mix-blend-mode:normal;"/>\
</g>\
<g id="bg" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path3_fill" transform="translate(2854.47 143.54)" fill="#F2F2F2" style="mix-blend-mode:normal;"/>\
</g>\
<g id="bg" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path4_fill" transform="translate(2842.99 178.629)" fill="#F2F2F2" style="mix-blend-mode:normal;"/>\
</g>\
<g id="bg" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path5_fill" transform="translate(2534.57 41.1557)" fill="#F2F2F2" style="mix-blend-mode:normal;"/>\
</g>\
<g id="bg" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path6_fill" transform="translate(2654.76 95.6045)" fill="#F2F2F2" style="mix-blend-mode:normal;"/>\
</g>\
</g>\
<g id="office-worker" style="mix-blend-mode:normal;" figma:type="frame">\
<g id="Vector" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path7_fill" transform="translate(2596.06 -1.15151)" fill="#08415C" style="mix-blend-mode:normal;"/>\
</g>\
<g id="Subtract" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path8_fill" transform="translate(2553.4 -11.4913)" fill="#08415C" style="mix-blend-mode:normal;"/>\
</g>\
<g id="Vector" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path9_fill" transform="translate(2599.24 50.8505)" fill="#EB5757" style="mix-blend-mode:normal;"/>\
</g>\
</g>\
<g id="pc" style="mix-blend-mode:normal;" figma:type="frame">\
<g id="Rectangle 4 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path10_fill" transform="translate(2639.06 100.522)" fill="#08415C" style="mix-blend-mode:normal;"/>\
</g>\
<g id="Rectangle 4 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path11_fill" transform="translate(2660.43 113.566)" fill="#08415C" style="mix-blend-mode:normal;"/>\
</g>\
<g id="Vector 3 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path12_fill" transform="translate(2694.62 75.9114)" fill="#EB5757" style="mix-blend-mode:normal;"/>\
</g>\
<g id="Ellipse 2 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path13_fill" transform="translate(2673.69 54.057)" fill="#BDBDBD" style="mix-blend-mode:normal;"/>\
</g>\
</g>\
</g>\
<g id="wifi" style="mix-blend-mode:normal;" figma:type="frame">\
<g id="wifi_box (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path14_fill" transform="translate(2465.24 102.772)" fill="#BFBFBF" style="mix-blend-mode:normal;"/>\
</g>\
<g id="wifi_line2 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path15_fill" transform="matrix(-1 1.22465e-16 -1.22465e-16 -1 2512.88 117.226)" fill="#BFBFBF" style="mix-blend-mode:normal;"/>\
</g>\
<g id="wifi_line1 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path16_fill" transform="matrix(-1 1.22465e-16 -1.22465e-16 -1 2482.7 117.226)" fill="#BFBFBF" style="mix-blend-mode:normal;"/>\
</g>\
<g id="wifi signal" style="mix-blend-mode:normal;" figma:type="frame">\
<g id="Ellipse 3 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path17_fill" transform="matrix(0.707107 -0.707107 0.707107 0.707107 2482.01 80.7128)" fill="#EB5757" style="mix-blend-mode:normal;"/>\
</g>\
<g id="Ellipse 3 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path18_fill" transform="matrix(0.707107 -0.707107 0.707107 0.707107 2489.46 88.1655)" fill="#EB5757" style="mix-blend-mode:normal;"/>\
</g>\
<g id="Ellipse 3 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path19_fill" transform="matrix(0.707107 -0.707107 0.707107 0.707107 2496.77 95.4742)" fill="#EB5757" style="mix-blend-mode:normal;"/>\
</g>\
</g>\
</g>\
<g id="computer" style="mix-blend-mode:normal;" figma:type="frame">\
<g id="computer_stand (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path20_fill" transform="translate(2393.28 126.048)" fill="#08415C" style="mix-blend-mode:normal;"/>\
</g>\
<g id="computer_foot (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path21_fill" transform="translate(2381.34 139.45)" fill="#08415C" style="mix-blend-mode:normal;"/>\
</g>\
<g id="computer_r2 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path22_fill" transform="translate(2342.5 53.9993)" fill="#08415C" style="mix-blend-mode:normal;"/>\
</g>\
<g id="computer_r1 (Stroke)" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path23_fill" transform="translate(2349.78 60.842)" fill="#08415C" style="mix-blend-mode:normal;"/>\
</g>\
</g>\
<g id="connection3" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path24_stroke" transform="translate(2600.29 71.2666)" fill="#08415C" style="mix-blend-mode:normal;"/>\
</g>\
<g id="connection2" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path25_stroke" transform="translate(2452.29 72.6736)" fill="#BFBFBF" style="mix-blend-mode:normal;"/>\
</g>\
<g id="connection1" style="mix-blend-mode:normal;" figma:type="vector">\
<use xlink:href="#path26_stroke" transform="translate(2508.29 72.6736)" fill="#BFBFBF" style="mix-blend-mode:normal;"/>\
</g>\
</g>\
</g>\
<defs>\
<path id="path0_fill" d="M 89.5135 61.2021L 89.5135 34.2919C 89.5135 31.046 86.8727 28.4053 83.627 28.4053L 46.7563 28.4053L 46.7563 27.7139C 46.7563 26.806 46.4351 25.9724 45.9014 25.3187C 46.2974 24.8341 46.5736 24.2536 46.6918 23.6246C 48.192 22.7401 49.1483 21.1201 49.1483 19.3417C 49.1483 18.5019 48.9321 17.681 48.5268 16.9497C 48.9319 16.2184 49.1483 15.3977 49.1483 14.5577C 49.1483 12.7866 48.1995 11.181 46.7283 10.296C 46.747 10.1225 46.7563 9.94842 46.7563 9.77358C 46.7563 7.25444 44.8797 5.16521 42.4509 4.83076C 41.5642 3.34067 39.95 2.39204 38.1786 2.39204C 37.9511 2.39204 37.7214 2.40952 37.4913 2.44449C 36.5019 1.64341 35.2661 1.19602 33.9926 1.19602C 33.8225 1.19602 33.652 1.20459 33.4793 1.22172C 32.4156 0.42956 31.1353 0 29.8068 0C 28.4782 0 27.198 0.42956 26.1341 1.22172C 25.9612 1.20459 25.7907 1.19602 25.6208 1.19602C 24.344 1.19602 23.1279 1.62558 22.1403 2.41652C 20.5649 2.57369 19.1627 3.47949 18.3587 4.83093C 15.9299 5.16521 14.0533 7.25444 14.0533 9.77358C 14.0533 9.94824 14.0625 10.1225 14.0812 10.296C 12.6102 11.181 11.6612 12.7866 11.6612 14.5577C 11.6612 15.3977 11.8775 16.2184 12.2828 16.9497C 11.8775 17.681 11.6612 18.5019 11.6612 19.3417C 11.6612 21.1201 12.6174 22.7401 14.118 23.6246C 14.1839 23.9756 14.3005 24.311 14.4582 24.6236C 13.491 25.3119 12.8573 26.439 12.8573 27.7137L 12.8573 30.1057C 12.8573 32.1974 14.5589 33.8994 16.6509 33.8994L 17.2738 33.8994L 17.3758 34.5361C 17.612 36.0128 18.3748 37.3534 19.5237 38.3109L 20.0335 38.7358L 20.0335 42.6913C 20.0335 43.1287 19.7524 43.5093 19.3342 43.6378L 8.85135 46.8633C 6.23972 47.667 4.48494 50.0428 4.48494 52.7754L 4.48494 70.1721C 4.48494 71.9007 5.08391 73.4913 6.0829 74.7506L 2.8966 74.7506C 1.29935 74.7506 0 76.05 0 77.6472L 0 80.6372C 0 82.2344 1.29935 83.5338 2.8966 83.5338L 86.6169 83.5338C 88.2142 83.5338 89.5135 82.2344 89.5135 80.6372L 89.5135 77.6472C 89.5135 76.05 88.2142 74.7506 86.6169 74.7506L 71.3989 74.7506L 70.3772 67.0886L 83.627 67.0886C 86.8727 67.0886 89.5135 64.448 89.5135 61.2021ZM 16.6506 31.0963C 16.1046 31.0963 15.6601 30.6521 15.6601 30.1059L 15.6601 27.7139C 15.6601 27.352 15.8574 27.0382 16.1479 26.8653L 16.825 31.0963L 16.6506 31.0963ZM 16.8574 22.9714C 16.863 22.9289 16.8682 22.8866 16.8721 22.8436C 16.9303 22.203 16.5448 21.6049 15.9374 21.3932C 15.0563 21.0862 14.4643 20.2619 14.4643 19.3419C 14.4643 18.6641 14.7748 18.1772 15.0351 17.888C 15.5152 17.3548 15.5152 16.545 15.035 16.0117C 14.7745 15.7226 14.4641 15.2357 14.4641 14.5578C 14.4641 13.5812 15.1299 12.719 16.0834 12.4609C 16.4698 12.3562 16.7932 12.0915 16.9716 11.7331C 17.1502 11.3749 17.167 10.9572 17.0179 10.5857C 16.9104 10.3187 16.856 10.0454 16.856 9.77393C 16.856 8.58543 17.8092 7.61529 18.9914 7.58802C 19.051 7.59606 19.111 7.60271 19.172 7.60638C 19.7996 7.64239 20.3727 7.26074 20.579 6.66841C 20.881 5.8016 21.6834 5.21486 22.5852 5.19581C 22.6123 5.19773 22.6396 5.19895 22.667 5.1993C 23.0459 5.20385 23.405 5.06154 23.6732 4.79842C 24.1987 4.28301 24.8904 3.99909 25.6205 3.99909C 25.8094 3.99909 26.0098 4.02356 26.2329 4.07374C 26.6859 4.17567 27.1609 4.04647 27.4999 3.72827C 28.1354 3.13192 28.9545 2.80342 29.8066 2.80342C 30.6587 2.80342 31.4778 3.13192 32.1132 3.72845C 32.452 4.04664 32.9268 4.17602 33.3802 4.07392C 33.6032 4.02356 33.8036 3.99926 33.9926 3.99926C 34.7753 3.99926 35.5042 4.3276 36.0449 4.92359C 36.4194 5.33637 37.0028 5.48795 37.5308 5.30997C 37.7599 5.23287 37.9719 5.19528 38.1787 5.19528C 39.0987 5.19528 39.9232 5.78726 40.2302 6.66823C 40.4365 7.26039 41.0101 7.64362 41.6373 7.6062C 41.6944 7.60288 41.7507 7.59659 41.8175 7.58785C 42.9997 7.61494 43.9531 8.58526 43.9531 9.77376C 43.9531 10.0453 43.8987 10.3185 43.7913 10.5853C 43.642 10.9568 43.6588 11.3745 43.8375 11.7329C 44.0162 12.0913 44.3394 12.3562 44.726 12.4607C 45.6792 12.7188 46.3451 13.5811 46.3451 14.5577C 46.3451 15.2355 46.0346 15.7224 45.7743 16.0116C 45.294 16.5446 45.294 17.3546 45.7743 17.8878C 46.0348 18.177 46.3451 18.6639 46.3451 19.3417C 46.3451 20.2617 45.7531 21.0862 44.872 21.393C 44.2646 21.6048 43.8791 22.2029 43.9373 22.8434C 43.9412 22.8864 43.9464 22.9291 43.9524 22.9716C 43.9338 23.3971 43.6359 23.7662 43.2151 23.8781C 43.1702 23.89 41.8297 23.9202 41.8297 23.9202L 41.0238 19.0844C 40.9045 18.3692 40.258 17.863 39.5367 17.9172C 39.4716 17.9221 39.408 17.93 39.344 17.9387L 39.3358 17.9398C 38.6176 17.927 37.9532 17.5621 37.5527 16.9579C 37.2929 16.5665 36.8546 16.331 36.3846 16.331C 35.9149 16.331 35.4762 16.5665 35.2166 16.9577C 34.8087 17.5728 34.1277 17.9399 33.3945 17.9399C 32.6614 17.9399 31.9805 17.5728 31.5724 16.9577C 31.3126 16.5663 30.8743 16.3308 30.4044 16.3308C 29.9346 16.3308 29.4959 16.5663 29.2363 16.9576C 28.8284 17.5726 28.1475 17.9398 27.4142 17.9398C 26.6812 17.9398 26.0002 17.5726 25.5921 16.9576C 25.3323 16.5661 24.894 16.3306 24.4241 16.3306C 23.9543 16.3306 23.5157 16.5661 23.256 16.9574C 22.8553 17.5616 22.191 17.9265 21.4729 17.9392L 21.4647 17.9382C 21.4011 17.9295 21.3369 17.9216 21.2719 17.9167C 20.5507 17.8616 19.9042 18.3688 19.7849 19.0839L 18.9791 23.9202C 18.9791 23.9202 17.6389 23.8901 17.594 23.8783C 17.1735 23.7664 16.8754 23.397 16.8574 22.9714ZM 43.9532 27.7139L 43.9532 28.4053L 43.219 28.4053L 43.4655 26.8653C 43.756 27.0382 43.9532 27.352 43.9532 27.7139ZM 18.9639 26.7235L 19.1536 26.7235C 20.4285 26.7235 21.506 25.8105 21.7159 24.5529L 22.3653 20.6561C 23.1156 20.5142 23.8188 20.2017 24.4246 19.747C 25.2755 20.386 26.3191 20.7434 27.4146 20.7434C 28.5099 20.7434 29.5536 20.3858 30.4045 19.747C 31.2554 20.386 32.299 20.7434 33.3945 20.7434C 34.4898 20.7434 35.5336 20.3858 36.3845 19.747C 36.9901 20.2019 37.6934 20.514 38.4438 20.6561L 39.0931 24.5531C 39.2461 25.471 39.8625 26.2032 40.6795 26.5329L 40.38 28.4053L 38.7765 28.4053C 35.5306 28.4053 32.8899 31.0462 32.8899 34.2919L 32.8899 40.5124C 32.6376 40.6108 32.3681 40.6643 32.0955 40.6643L 27.5175 40.6643C 27.007 40.6643 26.51 40.4844 26.1178 40.1575L 21.3175 36.1572C 20.6892 35.6336 20.2722 34.9007 20.143 34.0931L 18.9639 26.7235ZM 20.1584 46.3171C 21.7604 45.8243 22.8364 44.3671 22.8364 42.6913L 22.8364 41.0717L 24.3236 42.3111C 25.2185 43.0569 26.3528 43.4676 27.5179 43.4676L 32.0958 43.4676C 32.3625 43.4676 32.6282 43.4448 32.8903 43.4022L 32.8903 52.4207C 32.0679 52.5549 31.2318 52.6245 30.3926 52.6245C 25.7171 52.6245 21.3079 50.4853 18.4048 46.8568L 20.1584 46.3171ZM 7.28819 52.7752C 7.28819 51.2809 8.24783 49.9818 9.67585 49.5422L 15.5584 47.7324C 18.9597 52.5523 24.497 55.4274 30.3926 55.4274C 31.2299 55.4274 32.0647 55.3685 32.8903 55.2547L 32.8903 61.2021C 32.8903 64.448 35.5309 67.0886 38.7768 67.0886L 44.8503 67.0886L 44.8503 74.6571C 44.8503 74.6887 44.8529 74.7195 44.855 74.7505L 37.1883 74.7505L 37.1883 73.1619C 37.1883 69.916 34.5475 67.2754 31.3018 67.2754L 16.3516 67.2754C 16.3 67.2754 16.2582 67.2336 16.2582 67.182L 16.2582 58.2119C 16.2582 57.438 15.6308 56.8103 14.8566 56.8103C 14.0825 56.8103 13.455 57.4378 13.455 58.2119L 13.455 67.182C 13.455 68.7793 14.7543 70.0786 16.3516 70.0786L 25.415 70.0786L 25.415 74.7505L 11.8667 74.7505C 9.3421 74.7505 7.28819 72.6965 7.28819 70.172L 7.28819 52.7752ZM 34.3851 73.1621L 34.3851 74.7506L 28.2183 74.7506L 28.2183 70.0788L 31.3018 70.0788C 33.0018 70.0786 34.3851 71.4619 34.3851 73.1621ZM 86.6169 77.5537C 86.6685 77.5537 86.7103 77.5955 86.7103 77.647L 86.7103 80.637C 86.7103 80.6886 86.6685 80.7304 86.6169 80.7304L 2.8966 80.7304C 2.84503 80.7304 2.80324 80.6886 2.80324 80.637L 2.80324 77.647C 2.80324 77.5955 2.84503 77.5537 2.8966 77.5537L 86.6169 77.5537ZM 47.6486 74.7506C 47.6507 74.7197 47.6534 74.6887 47.6534 74.6573L 47.6534 67.0888L 52.0262 67.0888L 51.0045 74.7508L 47.6486 74.7508L 47.6486 74.7506ZM 53.8326 74.7506L 56.265 56.5072C 56.3699 55.7211 57.0467 55.1286 57.8397 55.1286L 64.5641 55.1286C 65.3569 55.1286 66.0339 55.7211 66.1386 56.5072L 68.5712 74.7506L 53.8326 74.7506ZM 70.172 64.2856C 70.1153 64.2856 70.0601 64.29 70.005 64.2964L 68.917 56.1367C 68.6273 53.9641 66.7559 52.3256 64.5641 52.3256L 57.8397 52.3256C 55.6479 52.3256 53.7763 53.9641 53.4866 56.1367L 52.3986 64.2964C 52.3439 64.29 52.2883 64.2856 52.2317 64.2856L 38.7767 64.2856C 37.0764 64.2856 35.6932 62.9023 35.6932 61.2021L 35.6932 34.2919C 35.6932 32.5917 37.0764 31.2084 38.7767 31.2084L 83.627 31.2084C 85.3272 31.2084 86.7105 32.5917 86.7105 34.2919L 86.7105 61.2021C 86.7105 62.9023 85.3272 64.2856 83.627 64.2856L 70.172 64.2856Z"/>\
<path id="path1_fill" d="M 147.739 73.8695C 147.739 114.666 114.666 147.739 73.8695 147.739C 33.0725 147.739 0 114.666 0 73.8695C 0 33.0725 33.0725 0 73.8695 0C 114.666 0 147.739 33.0725 147.739 73.8695Z"/>\
<path id="path2_fill" d="M 54.155 27.0775C 54.155 42.032 42.032 54.155 27.0775 54.155C 12.123 54.155 0 42.032 0 27.0775C 0 12.123 12.123 0 27.0775 0C 42.032 0 54.155 12.123 54.155 27.0775Z"/>\
<path id="path3_fill" d="M 19.7972 9.89858C 19.7972 15.3654 15.3654 19.7972 9.89858 19.7972C 4.43175 19.7972 0 15.3654 0 9.89858C 0 4.43175 4.43175 0 9.89858 0C 15.3654 0 19.7972 4.43175 19.7972 9.89858Z"/>\
<path id="path4_fill" d="M 8.66067 4.33034C 8.66067 6.72191 6.72191 8.66067 4.33034 8.66067C 1.93876 8.66067 0 6.72191 0 4.33034C 0 1.93876 1.93876 0 4.33034 0C 6.72191 0 8.66067 1.93876 8.66067 4.33034Z"/>\
<path id="path5_fill" d="M 10.5056 5.25278C 10.5056 8.15381 8.15381 10.5056 5.25278 10.5056C 2.35175 10.5056 0 8.15381 0 5.25278C 0 2.35175 2.35175 0 5.25278 0C 8.15381 0 10.5056 2.35175 10.5056 5.25278Z"/>\
<path id="path6_fill" d="M 115.668 57.834C 115.668 89.7748 89.7748 115.668 57.834 115.668C 25.8932 115.668 0 89.7748 0 57.834C 0 25.8932 25.8932 0 57.834 0C 89.7748 0 115.668 25.8932 115.668 57.834Z"/>\
<path id="path7_fill" d="M 3.07607 5.49289C 3.07607 4.16067 4.29488 3.16149 5.60123 3.42276L 15.5132 5.40516C 16.0322 5.50895 16.4057 5.9646 16.4057 6.49381C 16.4057 7.10696 16.9028 7.60402 17.5159 7.60402L 17.9438 7.60402C 18.7932 7.60402 19.4818 6.91542 19.4818 6.06599L 19.4818 5.10819C 19.4818 3.91847 18.6421 2.89415 17.4754 2.66082L 4.54687 0.0751116C 2.19462 -0.395339 0 1.40382 0 3.80266L 0 6.06599C 0 6.91542 0.688603 7.60402 1.53804 7.60402C 2.38747 7.60402 3.07607 6.91542 3.07607 6.06599L 3.07607 5.49289Z"/>\
<path id="path8_fill" fill-rule="evenodd" d="M 76.4486 38.9493C 78.5775 39.3364 80.2159 41.049 80.5083 43.1931L 84.9092 75.4663L 89.5099 75.4663C 90.3596 75.4663 91.0484 76.1551 91.0484 77.0048L 91.0484 77.0053C 91.0484 77.8547 90.3598 78.5433 89.5104 78.5433L 87.9728 78.5433C 87.9726 78.5433 87.9724 78.5431 87.9724 78.5429C 87.9724 78.5426 87.9722 78.5424 87.9719 78.5424L 85.3286 78.5424L 73.6207 78.5424L 72.0827 78.5424L 32.7089 78.5424L 31.1709 78.5424L 19.4629 78.5424L 4.81921 78.5424C 3.85651 78.5424 3.07609 79.3228 3.07609 80.2855C 3.07609 81.2482 3.85651 82.0286 4.81921 82.0286L 87.927 82.0286C 87.9273 82.0286 87.9275 82.0286 87.9278 82.0286L 89.511 82.029C 90.3601 82.0292 91.0484 82.7177 91.0484 83.5669C 91.0484 84.4162 90.3599 85.1047 89.5106 85.1047L 4.81918 85.1047C 2.15762 85.1047 0 82.9471 0 80.2855C 0 77.624 2.15762 75.4663 4.81918 75.4663L 19.8823 75.4663L 24.2833 43.1928C 24.5756 41.0488 26.214 39.3362 28.343 38.9491L 39.2283 36.9699C 41.2126 36.6091 42.6549 34.8809 42.6549 32.8641C 42.6549 31.8707 42.2795 30.9238 41.7239 30.1002C 40.8397 28.7896 40.1728 27.3097 39.7793 25.718C 39.4375 24.3351 38.8686 22.9907 37.8598 21.9848C 36.7285 20.8567 36.0926 19.3248 36.0926 17.7272L 36.0926 8.10034C 36.0926 3.63388 39.7264 5.0104e-16 44.1929 5.18127e-32L 44.1929 0L 60.5987 0L 60.5987 1.34373e-31C 65.0652 8.06884e-16 68.699 3.63388 68.699 8.10034L 68.699 17.8074C 68.699 19.353 68.085 20.8353 66.9921 21.9281C 65.9687 22.9515 65.4179 24.3323 65.1009 25.7445C 64.7322 27.3869 64.0476 28.9337 63.0779 30.3154C 62.5166 31.1152 62.1366 32.0437 62.1366 33.0208C 62.1366 34.947 63.5142 36.5976 65.4093 36.9421L 76.4486 38.9493ZM 24.1455 75.4663L 31.1709 75.4663L 31.1709 71.4519L 24.1455 75.4663ZM 51.9971 35.8816C 51.9966 35.8816 51.996 35.8816 51.9955 35.8816C 50.4542 35.8352 48.9777 35.5061 47.6124 34.9428C 46.7594 34.5909 45.7311 35.1714 45.7311 36.0941C 45.7312 36.5072 45.9479 36.8899 46.3021 37.1024L 48.967 38.7014C 51.0776 39.9678 53.7144 39.9678 55.825 38.7014L 58.4976 37.0978C 58.847 36.8882 59.0608 36.5106 59.0608 36.1031C 59.0608 35.2021 58.066 34.6299 57.2294 34.9645C 55.713 35.5709 54.0815 35.8877 52.4005 35.8877C 52.2662 35.8877 52.132 35.8857 51.9971 35.8816ZM 55.4718 49.2172L 52.3958 45.1158L 49.3197 49.2172L 55.4718 49.2172ZM 68.2415 40.5836C 67.2687 40.4067 66.276 40.767 65.643 41.5266L 59.2341 49.2172L 67.851 49.2172L 70.2046 44.51C 71.0227 42.874 70.0411 40.9108 68.2415 40.5836ZM 36.55 40.5834C 34.7504 40.9106 33.7689 42.8738 34.5868 44.5098L 36.9406 49.2172L 45.5574 49.2172L 39.1485 41.5264C 38.5156 40.7668 37.5228 40.4065 36.55 40.5834ZM 70.5446 52.2932L 34.247 52.2932L 34.247 75.4663L 70.5446 75.4663L 70.5446 52.2932ZM 80.646 75.4663L 73.6207 71.4519L 73.6207 75.4663L 80.646 75.4663ZM 73.6207 59.2042C 73.6207 64.5869 76.5049 69.557 81.1784 72.2277L 81.3785 72.3421L 77.4257 43.3539C 77.3339 42.6808 76.8196 42.1432 76.1513 42.0217C 75.465 41.8968 74.7786 42.24 74.4666 42.864L 71.2901 49.2172L 73.6207 49.2172L 73.6207 59.2042ZM 55.9257 44.6954C 56.6686 45.6859 58.1413 45.7237 58.934 44.7725L 61.9647 41.1356C 62.5121 40.4788 62.1481 39.4756 61.3069 39.3227C 61.0403 39.2742 60.7652 39.3243 60.5328 39.4637L 56.4733 41.8995C 55.4979 42.4848 55.2431 43.7854 55.9257 44.6954ZM 39.1687 16.5751C 39.1687 18.0929 39.7728 19.5483 40.8476 20.62L 42.0073 21.7764C 42.2819 22.0501 42.4429 22.4176 42.458 22.805C 42.458 22.8051 42.458 22.8053 42.458 22.8054C 42.6728 28.2566 46.901 32.6492 52.0847 32.8068C 52.0871 32.8069 52.0896 32.807 52.092 32.8071C 54.8064 32.8862 57.3754 31.8921 59.3213 30.004C 59.3214 30.0039 59.3215 30.0038 59.3216 30.0037C 61.2693 28.1135 62.3417 25.5785 62.3417 22.8655C 62.3417 22.4577 62.5037 22.0665 62.7921 21.7781L 63.9823 20.588C 65.0327 19.5375 65.6229 18.1128 65.6229 16.6273L 65.6229 8.10034C 65.6229 5.33002 63.369 3.07607 60.5987 3.07607L 44.1929 3.07607C 41.4226 3.07607 39.1687 5.33002 39.1687 8.10034L 39.1687 16.5751ZM 48.8659 44.6954C 49.5484 43.7854 49.2937 42.4848 48.3183 41.8995L 44.2588 39.4637C 44.0264 39.3243 43.7513 39.2742 43.4847 39.3227C 42.6435 39.4756 42.2795 40.4788 42.8268 41.1356L 45.8576 44.7725C 46.6503 45.7237 48.123 45.6859 48.8659 44.6954ZM 30.3251 42.864C 30.0131 42.24 29.3267 41.8968 28.6403 42.0217C 27.972 42.1432 27.4577 42.6809 27.3659 43.3539L 23.413 72.3419L 31.1709 67.9088L 31.1709 49.2172L 33.5015 49.2172L 30.3251 42.864Z"/>\
<path id="path9_fill" d="M 11.5865 0L 1.53804 0C 0.688603 0 0 0.688603 0 1.53804C 0 2.38747 0.688603 3.07607 1.53804 3.07607L 11.5865 3.07607C 12.436 3.07607 13.1246 2.38747 13.1246 1.53804C 13.1246 0.688603 12.436 0 11.5865 0Z"/>\
<path id="path10_fill" fill-rule="evenodd" d="M 19.432 4.5C 15.1518 4.5 11.682 7.96979 11.682 12.25L 11.682 108.515L 81.0021 108.515C 85.095 108.515 88.4129 111.833 88.4129 115.926C 88.4129 117.533 89.7161 118.837 91.3237 118.837L 107.057 118.837C 108.665 118.837 109.968 117.533 109.968 115.926C 109.968 111.833 113.286 108.515 117.379 108.515L 185.941 108.515L 185.941 12.25C 185.941 7.96979 182.471 4.5 178.191 4.5L 151.685 4.5C 150.442 4.5 149.435 3.49264 149.435 2.25C 149.435 1.00736 150.442 0 151.685 0L 178.191 0C 184.957 0 190.441 5.48451 190.441 12.25L 190.441 108.772C 194.828 109.791 198.097 113.724 198.097 118.42L 198.097 123.92C 198.097 130.685 192.612 136.17 185.847 136.17L 12.25 136.17C 5.48451 136.17 0 130.685 0 123.92L 0 117.947C 0 113.513 3.05925 109.794 7.18204 108.785L 7.18204 12.25C 7.18204 5.48451 12.6666 0 19.432 0L 50.0981 0C 51.3407 0 52.3481 1.00736 52.3481 2.25C 52.3481 3.49264 51.3407 4.5 50.0981 4.5L 19.432 4.5ZM 9.43204 113.015C 6.70815 113.015 4.5 115.223 4.5 117.947L 4.5 123.92C 4.5 128.2 7.96979 131.67 12.25 131.67L 185.847 131.67C 190.127 131.67 193.597 128.2 193.597 123.92L 193.597 118.42C 193.597 115.435 191.176 113.015 188.191 113.015L 117.379 113.015C 115.771 113.015 114.468 114.318 114.468 115.926C 114.468 120.019 111.15 123.337 107.057 123.337L 91.3237 123.337C 87.2309 123.337 83.9129 120.019 83.9129 115.926C 83.9129 114.318 82.6097 113.015 81.0021 113.015L 9.43204 113.015Z"/>\
<path id="path11_fill" fill-rule="evenodd" d="M 5.25 4.5C 4.83579 4.5 4.5 4.83579 4.5 5.25L 4.5 85.2981C 4.5 85.7123 4.83579 86.0481 5.25 86.0481L 149.634 86.0481C 150.048 86.0481 150.384 85.7123 150.384 85.2981L 150.384 5.25C 150.384 4.83579 150.048 4.5 149.634 4.5L 130.114 4.5C 128.871 4.5 127.864 3.49264 127.864 2.25C 127.864 1.00736 128.871 0 130.114 0L 149.634 0C 152.533 0 154.884 2.35051 154.884 5.25L 154.884 85.2981C 154.884 88.1976 152.533 90.5481 149.634 90.5481L 5.25 90.5481C 2.35051 90.5481 0 88.1976 0 85.2981L 0 5.25C 0 2.35051 2.35051 0 5.25 0L 29.3318 0C 30.5744 0 31.5818 1.00736 31.5818 2.25C 31.5818 3.49264 30.5744 4.5 29.3318 4.5L 5.25 4.5Z"/>\
<path id="path12_fill" fill-rule="evenodd" d="M 50.1118 0L 50.9783 0.411938L 89.0632 18.5179L 90.3472 19.1283L 90.3472 20.55L 90.3472 65.5027L 90.3472 67.0819L 88.862 67.6187L 37.0415 86.349L 36.0838 86.6951L 35.1917 86.2041L 1.16499 67.4738L 0 66.8325L 0 65.5027L 0 20.55L 0 18.9967L 1.45244 18.4461L 49.2147 0.340088L 50.1118 0ZM 4.5 24.4183L 34.0267 41.2133L 34.0267 51.2632L 4.5 62.2634L 4.5 24.4183ZM 7.63395 65.8979L 34.0267 80.4261L 34.0267 56.0654L 7.63395 65.8979ZM 38.5267 54.3889L 38.5267 81.0272L 82.213 65.237L 49.9141 50.1465L 38.5267 54.3889ZM 52.2623 46.2766L 85.8472 61.968L 85.8472 23.7921L 52.2623 36.3359L 52.2623 46.2766ZM 52.2623 31.5323L 82.3331 20.301L 52.2623 6.00499L 52.2623 31.5323ZM 47.7623 5.70317L 47.7623 33.213L 36.4748 37.4288L 7.51933 20.9587L 47.7623 5.70317ZM 38.5267 41.466L 47.7623 38.0166L 47.7623 46.146L 38.5267 49.5868L 38.5267 41.466Z"/>\
<path id="path13_fill" fill-rule="evenodd" d="M 64.495 4.5C 62.999 4.49963 61.5561 4.55216 60.0872 4.65866L 59.7629 0.170366C 61.3121 0.0587802 62.9172 0.000372171 64.495 0C 66.1174 0.000393867 67.7674 0.0621464 69.3595 0.180065L 69.0261 4.66769C 67.5165 4.55514 66.0332 4.49961 64.495 4.5ZM 54.8333 5.27012C 51.874 5.74533 49.0662 6.41668 46.2656 7.30604L 44.9058 3.01642C 47.8623 2.0807 50.9923 1.33255 54.1175 0.827411L 54.8333 5.27012ZM 83.218 7.46486C 80.3472 6.52567 77.4652 5.81623 74.4248 5.31394L 75.1607 0.874515C 78.3716 1.40845 81.5843 2.19906 84.615 3.1872L 83.218 7.46486ZM 41.3011 9.12511C 38.5493 10.2721 35.9735 11.5799 33.4443 13.1055L 31.122 9.25102C 33.7924 7.64385 36.6627 6.18666 39.5677 4.97238L 41.3011 9.12511ZM 96.3247 13.5829C 93.7484 11.9751 91.118 10.5957 88.3027 9.38533L 90.0822 5.25215C 93.0541 6.53351 95.9851 8.07036 98.7052 9.76414L 96.3247 13.5829ZM 29.0386 16.0306C 26.6369 17.7795 24.4313 19.6485 22.3152 21.725L 19.165 18.5116C 21.3996 16.323 23.8551 14.2424 26.3878 12.3942L 29.0386 16.0306ZM 107.6 22.6515C 105.47 20.4698 103.241 18.5043 100.804 16.6637L 103.518 13.0744C 106.088 15.0193 108.57 17.2073 110.819 19.5068L 107.6 22.6515ZM 18.7031 25.5892C 16.7757 27.8381 15.0596 30.164 13.4757 32.6807L 9.66845 30.2818C 11.3429 27.6271 13.2537 25.0371 15.2848 22.6625L 18.7031 25.5892ZM 116.402 34.1349C 114.847 31.5016 113.146 29.0652 111.221 26.7074L 114.709 23.8638C 116.737 26.3534 118.631 29.0665 120.276 31.8447L 116.402 34.1349ZM 10.8557 37.2747C 10.1797 38.5905 9.56822 39.8968 8.98837 41.2662L 4.84501 39.5105C 5.45805 38.0647 6.13966 36.6086 6.8525 35.2194L 10.8557 37.2747ZM 120.742 43.0971C 120.193 41.67 119.607 40.3078 118.955 38.9349L 123.019 37.0041C 123.707 38.4537 124.36 39.9722 124.941 41.4791L 120.742 43.0971ZM 0.637206 75.566C 0.365805 73.9488 0.148915 72.2681 0 70.6122L 4.48202 70.2103C 4.62226 71.7791 4.81698 73.2878 5.07495 74.82L 0.637206 75.566ZM 128.864 71.8771C 128.685 73.5072 128.44 75.1614 128.142 76.7524L 123.719 75.9237C 124.002 74.4163 124.222 72.9318 124.391 71.3876L 128.864 71.8771ZM 5.20508 90.8356C 3.88653 87.838 2.75985 84.6379 1.90362 81.4207L 6.25286 80.2657C 7.06009 83.3121 8.07095 86.1825 9.32328 89.0216L 5.20508 90.8356ZM 126.788 82.5062C 125.888 85.6638 124.725 88.8027 123.378 91.7414L 119.288 89.8642C 120.567 87.0808 121.611 84.2652 122.46 81.2751L 126.788 82.5062ZM 13.3791 104.517C 11.3584 101.92 9.48347 99.0923 7.87175 96.1994L 11.804 94.0113C 13.3277 96.7532 15.0113 99.2923 16.9292 101.752L 13.3791 104.517ZM 120.668 96.9946C 119.038 99.8256 117.152 102.592 115.127 105.131L 111.611 102.323C 113.532 99.9182 115.226 97.4345 116.767 94.7512L 120.668 96.9946ZM 24.6354 115.795C 22.0348 113.759 19.5308 111.47 17.2724 109.067L 20.5533 105.987C 22.6916 108.267 24.9411 110.324 27.4075 112.25L 24.6354 115.795ZM 111.235 109.576C 108.981 111.923 106.489 114.157 103.905 116.144L 101.164 112.575C 103.614 110.695 105.853 108.688 107.987 106.461L 111.235 109.576ZM 38.3007 123.995C 35.268 122.651 32.2823 121.038 29.5179 119.263L 31.9516 115.478C 34.5699 117.163 37.2495 118.61 40.1227 119.881L 38.3007 123.995ZM 99.059 119.526C 96.3183 121.258 93.362 122.829 90.362 124.139L 88.5628 120.015C 91.4049 118.777 94.0581 117.366 96.6539 115.723L 99.059 119.526ZM 53.5616 128.593C 50.2721 128.032 46.9836 127.201 43.8853 126.163L 45.3166 121.897C 48.2514 122.883 51.2013 123.629 54.3161 124.157L 53.5616 128.593ZM 84.8408 126.251C 81.7791 127.262 78.5317 128.071 75.2847 128.617L 74.5402 124.179C 77.6147 123.665 80.5278 122.939 83.428 121.979L 84.8408 126.251ZM 64.495 129.513C 62.8305 129.512 61.1381 129.447 59.5055 129.323L 59.8476 124.836C 61.3955 124.955 62.9169 125.013 64.495 125.013C 66.052 125.013 67.5532 124.956 69.0809 124.841L 69.4184 129.328C 67.8072 129.449 66.1372 129.512 64.495 129.513Z"/>\
<path id="path14_fill" fill-rule="evenodd" d="M 53.7085 4L 6 4C 4.89543 4 4 4.89543 4 6L 4 21.0775C 4 22.1821 4.89543 23.0775 6 23.0775L 53.7085 23.0775C 54.8131 23.0775 55.7085 22.1821 55.7085 21.0775L 55.7085 6C 55.7085 4.89543 54.8131 4 53.7085 4ZM 6 0C 2.68629 0 0 2.68629 0 6L 0 21.0775C 0 24.3912 2.68629 27.0775 6 27.0775L 53.7085 27.0775C 57.0222 27.0775 59.7085 24.3912 59.7085 21.0775L 59.7085 6C 59.7085 2.68629 57.0222 0 53.7085 0L 6 0Z"/>\
<path id="path15_fill" fill-rule="evenodd" d="M 0 1.5C 0 0.671573 0.671573 0 1.5 0L 18.142 0C 18.9705 0 19.642 0.671573 19.642 1.5C 19.642 2.32843 18.9705 3 18.142 3L 1.5 3C 0.671573 3 0 2.32843 0 1.5Z"/>\
<path id="path16_fill" fill-rule="evenodd" d="M 0 1.5C 0 0.671573 0.671573 0 1.5 0L 2.92128 0C 3.74971 0 4.42128 0.671573 4.42128 1.5C 4.42128 2.32843 3.74971 3 2.92128 3L 1.5 3C 0.671573 3 0 2.32843 0 1.5Z"/>\
<path id="path17_fill" fill-rule="evenodd" d="M 0 2C 0 0.89543 0.89543 0 2 0C 18.7683 0 32.3618 13.5934 32.3618 30.3618C 32.3618 31.4663 31.4663 32.3618 30.3618 32.3618C 29.2572 32.3618 28.3618 31.4663 28.3618 30.3618C 28.3618 15.8026 16.5592 4 2 4C 0.89543 4 0 3.10457 0 2Z"/>\
<path id="path18_fill" fill-rule="evenodd" d="M 0 2C 0 0.89543 0.89543 0 2 0C 12.9474 0 21.822 8.8746 21.822 19.822C 21.822 20.9265 20.9265 21.822 19.822 21.822C 18.7174 21.822 17.822 20.9265 17.822 19.822C 17.822 11.0837 10.7382 4 2 4C 0.89543 4 0 3.10457 0 2Z"/>\
<path id="path19_fill" fill-rule="evenodd" d="M 0 2C 0 0.89543 0.89543 0 2 0C 7.23897 0 11.486 4.24703 11.486 9.486C 11.486 10.5906 10.5906 11.486 9.486 11.486C 8.38143 11.486 7.486 10.5906 7.486 9.486C 7.486 6.45616 5.02983 4 2 4C 0.89543 4 0 3.10457 0 2Z"/>\
<path id="path20_fill" fill-rule="evenodd" d="M 0 0L 1.5 0L 26.7251 0L 28.2251 0L 28.2251 1.5L 28.2251 14.9026L 28.2251 16.4026L 26.7251 16.4026L 1.5 16.4026L 0 16.4026L 0 14.9026L 0 1.5L 0 0ZM 3 3L 3 13.4026L 25.2251 13.4026L 25.2251 3L 3 3Z"/>\
<path id="path21_fill" fill-rule="evenodd" d="M 0 3.5C 0 1.567 1.567 0 3.5 0L 48.5975 0C 50.5305 0 52.0975 1.567 52.0975 3.5L 52.0975 6.20129C 52.0975 8.13429 50.5305 9.70129 48.5975 9.70129L 3.5 9.70129C 1.567 9.70129 0 8.13429 0 6.20129L 0 3.5ZM 3.5 3C 3.22386 3 3 3.22386 3 3.5L 3 6.20129C 3 6.47744 3.22386 6.70129 3.5 6.70129L 48.5975 6.70129C 48.8737 6.70129 49.0975 6.47744 49.0975 6.20129L 49.0975 3.5C 49.0975 3.22386 48.8737 3 48.5975 3L 3.5 3Z"/>\
<path id="path22_fill" fill-rule="evenodd" d="M 0 6.5C 0 2.91015 2.91015 0 6.5 0L 122.938 0C 126.528 0 129.438 2.91015 129.438 6.5L 129.438 42.4511C 129.438 43.2795 128.767 43.9511 127.938 43.9511C 127.11 43.9511 126.438 43.2795 126.438 42.4511L 126.438 6.5C 126.438 4.567 124.871 3 122.938 3L 6.5 3C 4.567 3 3 4.567 3 6.5L 3 68.5483C 3 70.4813 4.567 72.0483 6.5 72.0483L 100.533 72.0483C 101.361 72.0483 102.033 72.7198 102.033 73.5483C 102.033 74.3767 101.361 75.0483 100.533 75.0483L 6.5 75.0483C 2.91015 75.0483 0 72.1381 0 68.5483L 0 6.5Z"/>\
<path id="path23_fill" fill-rule="evenodd" d="M 0 6C 0 2.68629 2.68629 0 6 0L 108.88 0C 112.194 0 114.88 2.68629 114.88 6L 114.88 36.4409C 114.88 36.9932 114.433 37.4409 113.88 37.4409C 113.328 37.4409 112.88 36.9932 112.88 36.4409L 112.88 6C 112.88 3.79086 111.09 2 108.88 2L 6 2C 3.79086 2 2 3.79086 2 6L 2 55.3628C 2 57.572 3.79086 59.3628 6 59.3628L 79.0441 59.3628C 79.5964 59.3628 80.0441 59.8106 80.0441 60.3628C 80.0441 60.9151 79.5964 61.3628 79.0441 61.3628L 6 61.3628C 2.68629 61.3628 0 58.6766 0 55.3628L 0 6ZM 83.4776 60.3628C 83.4776 59.8106 83.9253 59.3628 84.4776 59.3628L 93.2452 59.3628C 93.7975 59.3628 94.2452 59.8106 94.2452 60.3628C 94.2452 60.9151 93.7975 61.3628 93.2452 61.3628L 84.4776 61.3628C 83.9253 61.3628 83.4776 60.9151 83.4776 60.3628Z"/>\
<path id="path24_stroke" d="M -2.25 0L -2.25 141.517L 2.25 141.517L 2.25 0L -2.25 0ZM 10 153.767L 41.0195 153.767L 41.0195 149.267L 10 149.267L 10 153.767ZM -2.25 141.517C -2.25 148.283 3.23451 153.767 10 153.767L 10 149.267C 5.71979 149.267 2.25 145.798 2.25 141.517L -2.25 141.517Z"/>\
<path id="path25_stroke" d="M 106.508 69.3663L 6 69.3663L 6 72.3663L 106.508 72.3663L 106.508 69.3663ZM 1.5 64.8663L 1.5 53.9851L -1.5 53.9851L -1.5 64.8663L 1.5 64.8663ZM 6 49.4851L 14.8184 49.4851L 14.8184 46.4851L 6 46.4851L 6 49.4851ZM 111.008 0L 111.008 64.8663L 114.008 64.8663L 114.008 0L 111.008 0ZM 1.5 53.9851C 1.5 51.4998 3.51472 49.4851 6 49.4851L 6 46.4851C 1.85786 46.4851 -1.5 49.8429 -1.5 53.9851L 1.5 53.9851ZM 106.508 72.3663C 110.65 72.3663 114.008 69.0084 114.008 64.8663L 111.008 64.8663C 111.008 67.3515 108.994 69.3663 106.508 69.3663L 106.508 72.3663ZM 6 69.3663C 3.51472 69.3663 1.5 67.3515 1.5 64.8663L -1.5 64.8663C -1.5 69.0084 1.85786 72.3663 6 72.3663L 6 69.3663Z"/>\
<path id="path26_stroke" d="M 73.9078 172.758L 75.4078 172.758L 73.9078 172.758ZM 67.9078 177.258L 0 177.258L 0 180.258L 67.9078 180.258L 67.9078 177.258ZM 72.4077 3.31218e-07L 72.4078 172.758L 75.4078 172.758L 75.4077 -3.31218e-07L 72.4077 3.31218e-07ZM 67.9078 180.258C 72.0499 180.258 75.4078 176.9 75.4078 172.758L 72.4078 172.758C 72.4078 175.243 70.3931 177.258 67.9078 177.258L 67.9078 180.258Z"/>\
</defs>\
</svg>');
  
	

});



jQuery('.steps .step-count').click(function(){
	var e=window.event||e;
	jQuery(this).parent().parent('.steps').toggleClass('active');
	jQuery(this).parent().parent('.steps').siblings().removeClass('active');
	e.stopPropagation();
});

// jQuery(".steps .step-count").blur( function(){
//   jQuery(this).parent().parent('.steps').removeClass('active');
// });

jQuery(document).click(function(e){
   jQuery('.steps .step-count').parent().parent('.steps').removeClass('active');
});

// Scroll to div for learnmore
jQuery(".scroll-down").click(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery(".no-opac").offset().top + 100
    }, 2000);
});


}).call(this);
