<?php

function solo_pararut($cadena){
$permitidos = "1234567890.-kK ";
for ($i=0; $i<strlen($cadena); $i++){
if (strpos($permitidos, substr($cadena,$i,1))===false){
//no es válido;
return false;
}
}
//si estoy aqui es que todos los caracteres PERMITIDOS son validos
return true;
}


    function validaRut($rut){

    if (strlen($rut)<=7){
      return false;
    }

    if(strpos($rut,"-")==false){
        $RUT[0] = substr($rut, 0, -1);
        $RUT[1] = substr($rut, -1);
    }else{
        $RUT = explode("-", trim($rut));
    }
    $elRut = str_replace(".", "", trim($RUT[0]));
    $factor = 2;
    for($i = strlen($elRut)-1; $i >= 0; $i--):
        $factor = $factor > 7 ? 2 : $factor;
        $suma += $elRut{$i}*$factor++;
    endfor;
    $resto = $suma % 11;
    $dv = 11 - $resto;
    if($dv == 11){
        $dv=0;
    }else if($dv == 10){
        $dv="k";
    }else{
        $dv=$dv;
    }
   if($dv == trim(strtolower($RUT[1]))){
       return true;
   }else{
       return false;
   }
}

?>
