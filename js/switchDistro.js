$(function() {
  // Check if there is a hashtag, in that case, try to load that distribution
  var hash = window.location.hash.substr(1);
  if (typeof(hash) === 'string' && hash.length > 0) {
    updateDistribution(hash);
  } else {
    updateDistribution("linux");
  }
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