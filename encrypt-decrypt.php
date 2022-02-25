<?php
  function encrypt_decrypt($action, $string){
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'Loona';
    $secret_iv = 'BlockBerryCreative';
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256',$secret_iv),0,16); 

    if($action == 'e'){
      $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
      $output = base64_encode($string);
      return $output;
    }else if($action == 'd') {
      $output = openssl_decrypt($string, $encrypt_method, $key, 0, $iv);
      $output = base64_decode($string);
      return $output;
    }
  }
?>