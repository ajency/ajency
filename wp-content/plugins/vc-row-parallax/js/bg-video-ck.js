function _vcRowGetAllElementsWithAttribute(t){for(var e=[],a=document.getElementsByTagName("*"),o=0,i=a.length;i>o;o++)a[o].getAttribute(t)&&e.push(a[o]);return e}function _vcRowOnPlayerReady(t){var e=t.target;e.playVideo(),e.isMute&&e.mute(),e.loopInterval=setInterval(function(){"undefined"!=typeof e.loopTimeout&&clearTimeout(e.loopTimeout);var t=0;"undefined"!=typeof jQuery(e.a).parent().attr("data-loop-adjustment")&&""!==jQuery(e.a).parent().attr("data-loop-adjustment")&&"0"!==jQuery(e.a).parent().attr("data-loop-adjustment")&&(t=parseInt(jQuery(e.a).parent().attr("data-loop-adjustment"))),e.loopTimeout=setTimeout(function(){e.seekTo(0)},1e3*e.getDuration()-1e3*e.getCurrentTime()-60-t)},400)}function _vcRowOnPlayerStateChange(t){t.data===YT.PlayerState.ENDED&&("undefined"!=typeof t.target.loopTimeout&&clearTimeout(t.target.loopTimeout),t.target.seekTo(0))}function resizeVideo(t){var e=t.parent();if(null===e.find("iframe").width())return void setTimeout(function(){resizeVideo(t)},500);var a=t;a.css({width:"auto",height:"auto",left:"auto",top:"auto"}),a.css("position","absolute");var o=e.find("iframe").width(),i=e.find("iframe").height(),r=e.width(),n=e.height(),d=o/r,u=i/n,c;u>d?(c={width:r,height:i/d},c.top=-(c.height-n)/2):(c={width:o/u,height:n},c.left=-(c.width-r)/2);var s="100%",h="0";"undefined"!=typeof a.attr("data-height-correction")&&""!==a.attr("data-height-correction")&&"0"!==a.attr("data-height-correction")&&(s=100+parseFloat(a.attr("data-height-correction"))+"%",h=-parseFloat(a.attr("data-height-correction"))/4+"%");var l="100%",f="0";"undefined"!=typeof a.attr("data-width-correction")&&""!==a.attr("data-width-correction")&&"0"!==a.attr("data-width-correction")&&(l=100+parseFloat(a.attr("data-width-correction"))+"%",f=-parseFloat(a.attr("data-width-correction"))/4+"%"),a.css(c),e.find("iframe").css({width:l,height:s,marginLeft:f,marginTop:h})}function onYouTubeIframeAPIReady(){for(var t=_vcRowGetAllElementsWithAttribute("data-youtube-video-id"),e=0;e<t.length;e++){var a=t[e].getAttribute("data-youtube-video-id"),o=t[e].childNodes[0].getAttribute("id"),i=t[e].getAttribute("data-mute"),r=new YT.Player(o,{height:"auto",width:"auto",videoId:a,playerVars:{autohide:1,autoplay:1,fs:0,showinfo:0,loop:1,modestBranding:1,start:0,controls:0,rel:0,disablekb:1,iv_load_policy:3},events:{onReady:_vcRowOnPlayerReady,onStateChange:_vcRowOnPlayerStateChange}});r.isMute="true"===i}}var tag=document.createElement("script");tag.src="https://www.youtube.com/iframe_api";var firstScriptTag=document.getElementsByTagName("script")[0];firstScriptTag.parentNode.insertBefore(tag,firstScriptTag),jQuery(document).ready(function(t){var e=t("[data-youtube-video-id], [data-vimeo-video-id]").parent();e.css("overflow","hidden"),t("[data-youtube-video-id], [data-vimeo-video-id]").each(function(){var e=t(this);setTimeout(function(){resizeVideo(e)},100)}),t(window).resize(function(){t("[data-youtube-video-id], [data-vimeo-video-id]").each(function(){var e=t(this);setTimeout(function(){resizeVideo(e)},2)})})});