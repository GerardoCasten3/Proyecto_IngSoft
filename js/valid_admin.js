let valida_user = () => {
    let js_user = getTextInputByID("f_usuario");
    let js_password = getTextInputByID("f_contraseña");

    if(js_user <= 0){
        alert("Error: El usuario es obligatorio");
        return false;
    }

    else if(js_password <= 0){
        alert("Error: La contraseña es obligatoria");
        return false;
    }
    
}

let getTextInputByID=(id)=>{
    return document.getElementById(id).value.trim();
}