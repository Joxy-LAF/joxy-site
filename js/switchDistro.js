$(function() {  
  // Check if there is a hashtag, in that case, try to load that distribution
  var updateDistributionFromHash = function() {
      var hash = window.location.hash.substr(1);
      if (typeof(hash) === 'string' && hash.length > 0) {
        updateDistribution(hash);
      } else {
        updateDistribution("linux");
      }
    };
  
  updateDistributionFromHash();
  
  // If the hash changes, update selected distribution
  $(window).bind('hashchange', updateDistributionFromHash);
});

function updateDistribution(newDistro) {
  // update hash on the page
  if (typeof(window.location.hash) === 'string') {
    if (window.location.hash !== newDistro) {
      window.location.hash = newDistro;
    }
  }
  
  // update links in distribution navigation
  var docNav = $('#documentation-navigation a');
  if (docNav.size() > 0) {
    docNav.each(function(index, el) {
        var href = $(el).attr('href');
        if (href.indexOf('#') > 0) {
          href = href.substr(0, href.indexOf('#'));
        }
        $(el).attr('href', href + '#' + newDistro);
      });
  }
  
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