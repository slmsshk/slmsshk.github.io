document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("my-form");
    var downloadBtn = document.getElementById("download-pd");
    var warningMsg = document.getElementById("warning-msg");
  
    downloadBtn.addEventListener("click", function(e) {
      if (!form.checkValidity()) {
        e.preventDefault(); // Prevent form submission
        warningMsg.style.display = "block"; // Display the warning message
      } else {
        warningMsg.style.display = "none"; // Hide the warning message
        // Add your code to trigger the brochure download here
        // For example, you can use window.location.href to redirect to the brochure file
        window.open("Course Overview- Artificial Intellegence Machine Learning Deep Learning.pdf", "_blank");
      }
    });
  
    // Add event listeners to form fields to hide the warning message when the user starts entering details
    var formFields = form.querySelectorAll("input, select");
    formFields.forEach(function(field) {
      field.addEventListener("input", function() {
        warningMsg.style.display = "none"; // Hide the warning message
      });
    });
  });
  