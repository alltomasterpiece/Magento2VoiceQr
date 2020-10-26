<?php
    // get details of the uploaded file
    console.log($_FILES);
    print_r($_FILES);
    $fileTmpPath = $_FILES['audio_data']['tmp_name'];
    $fileName = $_FILES['audio_data']['name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    // sanitize file-name
    $newFileName = md5(time()) . '.' . "wav";
    // check if file has one of the following extensions
   // directory in which the uploaded file will be moved
      $uploadFileDir = './uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;
      move_uploaded_file($fileTmpPath, $dest_path);
      echo 'success';   