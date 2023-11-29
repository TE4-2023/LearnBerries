var sideShowing = false;
var sidenavbarDisplay = document.getElementsByClassName("vert-nav");

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