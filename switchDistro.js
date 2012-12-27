$(document).ready(function() {
	updateDistribution("linux");
});

function updateDistribution(newDistro) {
	// remove old active button
	$('#distro-linux').removeClass('active');
	$('#distro-debian').removeClass('active');
	$('#distro-arch').removeClass('active');
	$('#distro-chakra').removeClass('active');
	$('#distro-windows').removeClass('active');
	
	// handle new distribution
	$('#distro-' + newDistro).addClass('active');
	$('.distro').hide();
	$('.' + newDistro).show();
}