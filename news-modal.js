// Get the modal element
const modal = document.getElementById('NewsModal');
const edmodal = document.getElementById('EditNewsModal');

// Get the modal content
const modalContent = document.querySelector('.modal-content');

// When the user clicks anywhere outside of the modal content, close it
window.addEventListener('click', function(event) {
    if (event.target == modal) {
        closeNewsModal();
    }
});

// Function to open the modal
function openNewsModal() {
    modal.style.display = 'block';
}

// Function to close the modal
function closeNewsModal() {
    modal.style.display = 'none';
}

window.addEventListener('click', function(event) {
    if (event.target == edmodal) {
        closeEditModal();
    }
});


