<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $profession = $_POST["profession"];

  if (isset($_FILES["csvFile"])) {
    $file = $_FILES["csvFile"];
    $fileName = "{$name}_{$profession}.csv";
    $fileTmpName = $file["tmp_name"];
    $fileError = $file["error"];

    // Check if there was no file upload error
    if ($fileError === UPLOAD_ERR_OK) {
      // Specify the folder name for saving the file
      $uploadDir = __DIR__ . "/ml_dataset/";
      // Create the "ml_dataset" folder if it doesn't exist
      if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
      }
      // Move the uploaded file to the specified folder
      move_uploaded_file($fileTmpName, $uploadDir . $fileName);
      echo "File uploaded successfully!";
    } else {
      echo "Error uploading the file.";
    }
  } else {
    echo "No file selected.";
  }
}
?>
