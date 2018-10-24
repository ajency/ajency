// for the menu
var toggler = document.querySelector('.topnav__toggle')
toggler.onclick = function() {
	var menu = document.querySelector('.topnav__list');
	menu.classList.toggle('shown');
	document.querySelector('.topnav__toggle').classList.toggle('menu-shown');
	document.querySelector('.header').classList.toggle('menu-shown');
};

// for the scroll
//Finds x value of given object
function findPos(obj) {
	var curtop = 0;
	if (obj.offsetParent) {
		do {
			curtop += obj.offsetLeft;
		} while (obj = obj.offsetParent);
		return [curtop - 50];
	}
}
//Get object
var SupportDiv = document.querySelector('.linetabs--active');
var toScroll = document.querySelector('.linetabs__header');

//Scroll to location of SupportDiv on load
toScroll.scroll(findPos(SupportDiv), 0);