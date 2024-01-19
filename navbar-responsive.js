var isNavToggled = false; // Variabel för att hålla reda på om navigationen är aktiverad eller inte

function toggleNav() {
    var vertNav = document.getElementById("myVertnav");

    // Växla mellan att visa och dölja navigationen baserat på isNavToggled
    vertNav.style.display = (isNavToggled) ? "none" : "block";

    // Vänd på värdet av isNavToggled för att hålla reda på om navigationen är aktiverad eller inte
    isNavToggled = !isNavToggled;
}

window.addEventListener("resize", function() {
    var vertNav = document.getElementById("myVertnav");

    // Om fönsterbredden är större än 600 pixlar, visa navigationen
    if (window.innerWidth > 600) {
        vertNav.style.display = "block";
    }

    // Om fönsterbredden är mindre än eller lika med 600 pixlar och navigationen inte är aktiverad, dölj navigationen
    if (!isNavToggled && window.innerWidth <= 600){
        vertNav.style.display = "none";
    }
});
