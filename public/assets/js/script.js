$(document).ready(function() {

	$('.hastooltip').tooltipster({
		theme: 'tooltipster-punk'
	});

	$('[data-toggle="tooltip"]').tooltip();


	// var billList = $('.bill-list');

	// if(billList){
	// 	var rows = billList.find('tr');

	// 	rows.each(function(){

	// 		var elem = $(this);
	// 		var catName = elem.data('category');
	// 		var prev = elem.prev('tr[data-category="'+catName+'"]');

	// 		console.log('current', elem.data('category'), elem.data('total'));

	// 		console.log('previous', prev.data('category'), prev.data('total'));

	// 		console.log(' ');

	// 	});

	// }
	
});