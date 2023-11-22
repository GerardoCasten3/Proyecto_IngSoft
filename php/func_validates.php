<?php
function validaRequerido($valor){
    if(trim($valor) == ''){
       return false;
    }else{
       return true;
    }
 }
 
 function validarEntero($valor){
    $min=1;
    $max=2147483647;
    if(filter_var($valor, FILTER_VALIDATE_INT, array("options"=>
    array("min_range"=>$min, "max_range"=>$max))) === FALSE){
       return false;
    }else{
       return true;
    }
 }
 
 function validarNumerico($valor){
    if (!ctype_digit($valor)) {
    return false;
    }
    else{
      return true;
    }
 }
 
function validaEmail($valor){
    if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
       return false;
    }else{
       return true;
    }
 }
 
function validaSelecthtml($valor){
    if ($valor=='0'){
      return false;
    }
    else{
      return true;
    }
}

function validaDateTime($valor) {
   $dateTime = DateTime::createFromFormat('Y-m-d\TH:i', $valor);

   if ($dateTime && $dateTime->format('Y-m-d\TH:i') === $valor) {
       return true; 
   } else {
       return false; 
   }
}

function validaCURP($id) {
   $regexCurp = '/^[A-Z]{4}\d{6}[HM][A-Z]{5}[0-9A-Z]{2}$/';
   if (preg_match($regexCurp, $id)) {
       return true;
   } else {
       return false;
   }
}



?>