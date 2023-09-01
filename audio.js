document.addEventListener('DOMContentLoaded', function() {
// Get references to the button and the audio element
const button = document.getElementById('custom-button');
const clickSound = document.getElementById('click-sound');

// Function to play the click sound, wait for the sound to finish, and navigate to the page
function playClickSound(event) {
    event.preventDefault(); // Prevent the default behavior of the link

    clickSound.play(); // Play the click sound

    // Wait for the sound to finish playing
    clickSound.onended = function() {
    // Redirect to the "Machine_learning.html" page after the sound has finished playing
    window.location.href = "https://salemitmachinelearning.streamlit.app/";
    };
}

// Add a click event listener to the button to call the function when clicked
button.addEventListener('click', playClickSound);
});