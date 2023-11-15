let valida_forma = () => {
    let js_curp = getTextInputByID("f_curp");
    let js_fecha_hora = getTextInputByID("f_fh");
    let js_municipio = getTextInputByID("f_municipio");
    let js_docente = getTextInputByID("f_docente");
    let js_asunto = getTextInputByID("f_asunto");

 
    if(js_curp.length <= 0){
        alert("Error: El CURP es obligatorio");
        return false;
    }

    else if(!validateCURP(js_curp)){
        alert("Error: El formato del CURP no es válido.");
        return false;
    }

    else if(!js_fecha_hora){
        alert("Error: La fecha y hora son obligatorias");
        return false;
    }
    
    else if(js_municipio == 0){
        alert("Error: El municipio es obligatorio")
        return false;
    }

    else if(js_docente == 0){
        alert("Error: El docente es obligatorio")
        return false;
    }

    else if(js_asunto == 0){
        alert("Error: El asunto es obligatorio.")
        return false;
    }


}

let getTextInputByID=(id)=>{
    return document.getElementById(id).value.trim();
}

let validateCURP=(id)=>{
    let regexCurp = /^[A-Z]{4}\d{6}[HM][A-Z]{5}[0-9A-Z]{2}$/;
    if(regexCurp.test(id)){
        return true;
    }
        else{
            return false;
        }
}