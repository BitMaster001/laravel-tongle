/*--------------------
    HEADER SEARCH
--------------------*/
app.querySelector('#header-search', function (el) {
  const headerSearchDropdown = app.plugins.createDropdown({
    container: '.header-search-dropdown',
    offset: {
      top: 57,
      left: 0
    },
    animation: {
      type: 'translate-top'
    },
    controlToggle: true,
    closeOnWindowClick: false
  });

  const searchInput = el[0],
        breakpointWidth = 960;

  let previousValue = '';

  const hideSearchDropdownOnKey = function (e) {
    // ESC key pressed
    if (e.keyCode === 27) {
      headerSearchDropdown.hideDropdowns();
      previousValue = '';
      window.removeEventListener('keydown', hideSearchDropdownOnKey);
    }
  };

  const toggleSearchDropdown = function (e) {
    if (previousValue === '' && e.target.value !== '') {
      headerSearchDropdown.showDropdowns();
      window.addEventListener('keydown', hideSearchDropdownOnKey);
    } else if (e.target.value === '') {
      headerSearchDropdown.hideDropdowns();
      window.removeEventListener('keydown', hideSearchDropdownOnKey);
    }
    previousValue = e.target.value;
  };

  const interactiveInputAction = searchInput.parentElement.querySelector('.interactive-input-action');

  const hideSearchDropdown = function () {
    headerSearchDropdown.hideDropdowns();
    window.removeEventListener('keydown', hideSearchDropdownOnKey);
    previousValue = '';
  };

  if (window.innerWidth > breakpointWidth) {
    searchInput.addEventListener('input', toggleSearchDropdown);
    interactiveInputAction.addEventListener('click', hideSearchDropdown);
  }
});

/*----------------------
    HEADER DROPDOWNS
----------------------*/
app.plugins.createDropdown({
  trigger: '.header-dropdown-trigger',
  container: '.header-dropdown',
  offset: {
    top: 64,
    right: 6
  },
  animation: {
    type: 'translate-top'
  }
});

app.plugins.createDropdown({
  trigger: '.header-settings-dropdown-trigger',
  container: '.header-settings-dropdown',
  offset: {
    top: 64,
    right: 22
  },
  animation: {
    type: 'translate-top'
  }
});

/*---------------------------
    HEADER PROGRESS BARS
---------------------------*/
app.plugins.createProgressBar({
  container: '#logged-user-level',
  height: 4,
  lineColor: '#5538b5'
});

app.plugins.createProgressBar({
  container: '#logged-user-level',
  height: 4,
  gradient: {
    colors: ['#40d04f', '#d9ff65']
  },
  scale: {
    start: 0,
    end: 100,
    stop: 62
  },
  linkText: true,
  linkUnits: 'exp',
  invertedProgress: true
});

app.plugins.createProgressBar({
  container: '#logged-user-level-cp',
  height: 4,
  lineColor: '#5538b5'
});

app.plugins.createProgressBar({
  container: '#logged-user-level-cp',
  height: 4,
  gradient: {
    colors: ['#40d04f', '#d9ff65']
  },
  scale: {
    start: 0,
    end: 100,
    stop: 62
  },
  linkText: true,
  linkUnits: 'exp',
  invertedProgress: true
});


jQuery(document).ready(function(e){

    jQuery(document).mousedown(function(event) {

      if(!jQuery(event.target).hasClass('wrld-map-canvas')){

        switch (event.which) {
          case 1:
            jQuery("#jntClickAudio")[0].play();
            break;
          case 2:
            //alert('Middle Mouse button pressed.');
            break;
          case 3:
            //alert('Right Mouse button pressed.');
            break;
          default:
          //alert('You have a strange Mouse!');
        }

      }

    });
});
