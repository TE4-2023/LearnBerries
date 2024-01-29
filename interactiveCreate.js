document.addEventListener("DOMContentLoaded", function() {
    // Get references to the radio buttons, the h2 tag, and the form
    const uppgiftRadioButton = document.getElementById("uppgift");
    const meddelandeRadioButton = document.getElementById("meddelande");
    const provRadioButton = document.getElementById("prov");
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
      } else if(provRadioButton.checked){
        modalTitle.innerText = "Skapa prov";
        titleInput.value = ""; // Clear titleInput when switching to meddelande
        titleInput.placeholder = "Titel på prov";
        descInput.placeholder = "Beskrivning av prov...";
        createBtn.value = "Skicka prov";
      }
    }
  
    // Add event listeners to the radio buttons
    uppgiftRadioButton.addEventListener("change", updateContent);
    meddelandeRadioButton.addEventListener("change", updateContent);
    provRadioButton.addEventListener("change", updateContent);
    // Update heading and placeholders initially based on the default checked state
    updateContent();
  });
  