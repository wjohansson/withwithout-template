<?php 
if (isset($_POST['submit'])){

  $file = $_FILES['file'];

  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)){
    if ($fileError === 0){
      if ($fileSize < 700*1024){
        echo "Upload Successful!<br>";
          
      } else {
        echo "File too big";
      }
    }
  } else {
    echo "Cannot upload file type." . "<br>" . "Only .png and .jpeg allowed";
  }

}
?>