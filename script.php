<?php 
      // requires php5 
      $content = file_get_contents("php://input");
      define('UPLOAD_DIR', 'content/');  
      $img = $content;
      $img = str_replace('data:image/png;base64,', '', $img);  
      $img = str_replace(' ', '+', $img);  
      $data = base64_decode($img);  
      $file = $ROOT . UPLOAD_DIR . uniqid() . '.png';  
      $success = file_put_contents($file, $data);  
      print $success ? $file : 'Unable to save the file.';  

 ?>  