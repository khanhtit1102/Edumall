auto();
var slide=0;
function pre () {
	slide-=300;
	if (slide < 0) {
		slide = 1200;
	}
	document.getElementById('ul1').style.right = slide+'px';
	document.getElementById('ul2').style.right = slide+'px';
	document.getElementById('ul3').style.right = slide+'px';
}
function next () {
	slide+=300;
	if (slide > 1200) {
		slide = 0;
	}
	document.getElementById('ul1').style.right = slide+'px';
	document.getElementById('ul2').style.right = slide+'px';
	document.getElementById('ul3').style.right = slide+'px';
}
function auto () {
	setTimeout(auto, 2000);
	slide+=150;
	if (slide > 1200) {
		slide = 0;
	}
	document.getElementById('ul1').style.right = slide+'px';
	document.getElementById('ul2').style.right = slide+'px';
	document.getElementById('ul3').style.right = slide+'px';
}
//// END SLIDE TOPIC
//// BEGIN SILDE BANNER
// autobanner();
var slidebanner=0;
// function autobanner () {
// 	setTimeout(auto, 2000);
// 	slidebanner -=355;
// 	if (slidebanner < -710) {
// 		slidebanner = 0;
// 	}
// 	document.getElementById('ul-banner').style.top = slidebanner+'px';
// }
function banner1 () {
	slidebanner=0;
	document.getElementById('ul-banner').style.top = slidebanner+'px';
}
function banner2 () {
	slidebanner=-355;
	document.getElementById('ul-banner').style.top = slidebanner+'px';
}
function banner3 () {
	slidebanner=-710;
	document.getElementById('ul-banner').style.top = slidebanner+'px';
}