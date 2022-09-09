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

        $year = date("Y");
	    $month = date("F");

	    $path = "Uploads/".$year;
	    if (!file_exists($path))
            mkdir($path, 0777, true);
            $path = $path."/".$month;
        if (!file_exists($path))
            mkdir($path, 0777, true);

        $fileNameNew = uniqid("", true).".".$fileActualExt;
        $fileDestination = $path."/".$fileNameNew;

        move_uploaded_file($fileTmpName, $fileDestination);

        echo "Upload Successful!<br>";
        echo "<a href=\"".$fileDestination."\">Link to image</a>";

      } else {
            echo "File too big";
      }
    }
  } else {
    echo "Cannot upload file type";
  }


}
?>
