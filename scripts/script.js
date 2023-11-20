var sideShowing = false;
var sidenavbarDisplay = document.getElementById("sidenavbar");

function toggleSidenavbar() {
    if (sideShowing) {
        sidenavbarDisplay.style.display = "none";
    }
    else {
        sidenavbarDisplay.style.display = "inherit";
    }
    sideShowing = !sideShowing
}


const mediaQuery = window.matchMedia('(min-width: 851px)');

function handleTabletChange(e) {
    // Check if the media query is true
    if (e.matches) {
        // Then log the following message to the console
        try{
            sidenavbarDisplay.style.display = "inherit";
            
        } catch(err){
            console.error(err);
        }

        sideShowing = true;
      
    }
}
mediaQuery.addListener(handleTabletChange);
handleTabletChange(mediaQuery);






const mediaQuery2 = window.matchMedia('(max-width: 850px)');

function handleTabletChange2(e) {
    // Check if the media query is true
    if (e.matches) {
        // Then log the following message to the console
        sidenavbarDisplay.style.display = "none";
        sideShowing = false;
       
    }
}
mediaQuery2.addListener(handleTabletChange2);
handleTabletChange2(mediaQuery2);


// THEME TOGGLE
// Get the root element
var r = document.querySelector(':root');
var isDefaultTheme = true;

// Create a function for getting a variable value
function myFunction_get() {
  // Get the styles (properties and values) for the root
  var rs = getComputedStyle(r);
  // Alert the value of the --blue variable
  alert("The value of --blue is: " + rs.getPropertyValue('--text-color'));
}

// Create a function for setting a variable value
function theme_toggle() {
    var rs = getComputedStyle(r);
    var bg, fg, det, tex, acc;
    
    if (isDefaultTheme) {
        bg = rs.getPropertyValue('--d-bg-color');
        fg = rs.getPropertyValue('--d-fg-color');
        det = rs.getPropertyValue('--d-detail-color');
        tex = rs.getPropertyValue('--d-text-color');
        acc = rs.getPropertyValue('--d-accent-color');
    }
    else if (!isDefaultTheme) {
        bg = rs.getPropertyValue('--l-bg-color');
        fg = rs.getPropertyValue('--l-fg-color');
        det = rs.getPropertyValue('--l-detail-color');
        tex = rs.getPropertyValue('--l-text-color');
        acc = rs.getPropertyValue('--l-accent-color');
    }
    r.style.setProperty('--bg-color', bg);
    r.style.setProperty('--fg-color', fg);
    r.style.setProperty('--detail-color', det);
    r.style.setProperty('--text-color', tex);
    r.style.setProperty('--accent-color', acc);

    isDefaultTheme = !isDefaultTheme;
}