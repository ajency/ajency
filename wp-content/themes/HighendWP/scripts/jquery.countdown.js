!function(e){e.fn.countdown=function(t,n){function s(){if(eventDate=Date.parse(o.date)/1e3,currentDate=Math.floor(e.now()/1e3),currentDate>=eventDate){if("undefined"===n||null==n)return!1;n.call(this),clearInterval(interval)}seconds=eventDate-currentDate,days=Math.floor(seconds/86400),seconds-=60*days*60*24,hours=Math.floor(seconds/3600),seconds-=60*hours*60,minutes=Math.floor(seconds/60),seconds-=60*minutes,a.find(".timeRefDays").text(1==days?"day":"days"),a.find(".timeRefHours").text(1==hours?"hour":"hours"),a.find(".timeRefMinutes").text(1==minutes?"minute":"minutes"),a.find(".timeRefSeconds").text(1==seconds?"second":"seconds"),"on"==o.format&&(days=String(days).length>=2?days:"0"+days,hours=String(hours).length>=2?hours:"0"+hours,minutes=String(minutes).length>=2?minutes:"0"+minutes,seconds=String(seconds).length>=2?seconds:"0"+seconds),isNaN(eventDate)?(alert("Invalid date. Here's an example: 12 Tuesday 2015 17:30:00"),clearInterval(interval)):(a.find("> li .days").text(days),a.find("> li .hours").text(hours),a.find("> li .minutes").text(minutes),a.find("> li .seconds").text(seconds))}var a=jQuery(this),o={date:null,format:null};t&&e.extend(o,t),s(),interval=setInterval(s,1e3)}}(jQuery);