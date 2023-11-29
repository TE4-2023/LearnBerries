document.addEventListener("DOMContentLoaded", function() {
    // Get references to the radio buttons, the h2 tag, and the form
    const uppgiftRadioButton = document.getElementById("uppgift");
    const meddelandeRadioButton = document.getElementById("meddelande");
    const titleInput = document.querySelector(".upp-titel");
    const descInput = document.querySelector(".upp-besk");
    const createBtn = document.querySelector(".c-btn");
    const modalTitle = document.querySelector(".header-pop h2");
    const form = document.getElementById("form");
  
    // Function to update the heading and placeholders based on the selected radio button
    function updateContent() {
      if (uppgiftRadioButton.checked) {
        modalTitle.innerText = "Skapa uppgift";
        titleInput.value = ""; // Clear titleInput when switching to uppgift
        titleInput.placeholder = "Titel på uppgift";
        descInput.placeholder = "Beskrivning av uppgift...";
        createBtn.value = "Skapa uppgift";
      } else if (meddelandeRadioButton.checked) {
        modalTitle.innerText = "Skapa meddelande";
        titleInput.value = ""; // Clear titleInput when switching to meddelande
        titleInput.placeholder = "Titel på meddelande";
        descInput.placeholder = "Meddelande...";
        createBtn.value = "Skicka meddelande";
      }
    }
  
    // Add event listeners to the radio buttons
    uppgiftRadioButton.addEventListener("change", updateContent);
    meddelandeRadioButton.addEventListener("change", updateContent);
  
    // Update heading and placeholders initially based on the default checked state
    updateContent();
  
    // Additional code for form submission can be added here
    // form.addEventListener("submit", function(event) {
    //   // Prevent the default form submission behavior for this example
    //   event.preventDefault();
  
    //   // Add any additional form submission logic here
    // });
  });
  