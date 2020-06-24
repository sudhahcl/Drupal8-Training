(function ($) {
	Drupal.behaviors.showtime = {
	  attach: function (context, settings) {
	   timestartfun();
	  }	
	};
  })(jQuery);

  function checkTime(i) {
	if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
	return i;
  }
  function timestartfun() {
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	var currTime = '';
	m = checkTime(m);
	s = checkTime(s);
	if (h > 12) { 
	  currTime = 	h + ":" + m + ":" + s + ' PM';
	}
	else { 
	  currTime = 	h + ":" + m + ":" + s + ' AM'; 
	}
	jQuery("#block-time").html(currTime);
	var t = setTimeout(timestartfun, 1000);
	
	//return currTime;
  }