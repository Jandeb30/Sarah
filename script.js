// Select elements
const modal = document.getElementById("modal");
const closeModal = document.querySelector(".close");
const images = document.querySelectorAll(".instax-wrapper img"); // Select all images
const modalContent = modal.querySelector(".modal-content p"); // Select the modal's text element

// Show modal with custom text when an image is clicked
images.forEach((image) => {
    image.addEventListener("click", () => {
        const customText = image.getAttribute("data-text"); // Get the text from data-text attribute
        modalContent.textContent = customText; // Update modal text
        modal.style.display = "flex"; // Make the modal visible
    });
});

// Close modal when the "X" button is clicked
closeModal.addEventListener("click", () => {
    modal.style.display = "none"; // Hide the modal
});

// Close modal when clicking outside the modal content
window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
