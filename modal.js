// Get the modal
var modal = document.getElementById("myModal");
function buttonClick(){
  modal.style.display = "none";
}
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var dateTime = document.getElementById("deadline");

var meddelandeRadioButton = document.getElementById("meddelande");
var uppgiftRadioButton = document.getElementById("uppgift");
var provRadioButton = document.getElementById("prov");
meddelandeRadioButton.onchange = function() {
  if (meddelandeRadioButton.checked){
    dateTime.disabled = true;
  } 
}
uppgiftRadioButton.onchange = function() {
  if (uppgiftRadioButton.checked){
    dateTime.disabled = false;
  } 
}
provRadioButton.onchange = function() {
  if (provRadioButton.checked){
    dateTime.disabled = false;
  } 
}

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

document.getElementById("colorPickerContainer").addEventListener("click", function() {
    // Trigger the click event on the color wheel input
    document.querySelector(".color-wheel").click();
});

// function openModal(postid){
  
//   var modal = document.getElementById("myModal");
//   var frm = document.getElementById('form') || null;
//   if(frm) {
//      frm.action = 'editPosts.php'; 
//   }
//   else{
//     console.log("kos");
//   }
//   // Get the <span> element that closes the modal
//   var span = document.getElementsByClassName("close")[0];


//     modal.style.display = "block";

//   // When the user clicks on <span> (x), close the modal
//   span.onclick = function() {
//     modal.style.display = "none";
//   }

//   // When the user clicks anywhere outside of the modal, close it
//   window.onclick = function(event) {
//     if (event.target == modal) {
//       modal.style.display = "none";
//     }
//   };
// }

