
const downloadPdf = document
.querySelector("#download-pdf");

const submitForm = document
.querySelector("#submit-form");

downloadPdf.addEventListener("click", () => {

// Creating the element anchor that
// will download pdf
let element = document.createElement("a");
element.href = "broucher_Data_Sci_Artificial_Intelligence.pdf";
element.download = "broucher_Data_Sci_Artificial_Intelligence.pdf";
element.target='https://salemsit.org.in/index.html#about'
// Adding the element to body
document.documentElement.appendChild(element);

// Above code is equivalent to
// <a href="path of file" download="file name"> 

// onClick property, to trigger download
element.click();

// Removing the element from body
document.documentElement.removeChild(element);

 // onClick property, to trigger submit form
submitForm.click();
});
