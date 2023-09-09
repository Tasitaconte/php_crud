//document.oncontextmenu = function(){return false}
/*var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
	if(is_chrome==false)
	{
		alert("RECOMENDACION: UTILIZAR GOOGLE CHROME... PARA BUEN FUNCIONAMIENTO DEL APLICATIVO");
		location.href="https://www.google.es/chrome/browser/desktop/index.html";
  }*/


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function validarDate($fecha, $op) {

    if ($op == "1") { //fecha y hora
        $regexFecha = '/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})(\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9])$/';
    }
    if ($op == "2") { // fecha sola
        $regexFecha = '/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/';
    }



    //$fecha = '27/05/2017 23:00';
    if (!preg_match($regexFecha, $fecha)) {
        //echo 'Fecha no válida';
        return true;
    } else {
        return false;
        //echo 'Fecha válida';
        //print_r($matchFecha);
        /*
        array:9 [
          0 => "27/05/2017 23:00"
          1 => "27"
          2 => "/"
          3 => "05"
          4 => "2017"
          5 => " "
          6 => "23"
          7 => ":"
          8 => "00"
        ]
        */
    }
}



function validarEmail(email) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(email)) {

        return true;
        //alert("Error: La dirección de correo " + email + " es incorrecta.");
    } else {
        return false;
    }


}

function ESnumero(num) {
    if (!/^([0-9])*$/.test(num)) {
        return true;
    } else {
        return false;
    }
}

function ESnombre(ttx) {
    regexp = /^[A-Za-záéíóúñÑüÁÉÍÓÚÜNIÑOniñoN\sN]+$/;
    if (!regexp.test(ttx)) {
        return true;
    } else {
        return false;
    }

}

function placasola(placa) {

    regexp = /^[0-9a-zA-Z]+$/;
    if (!regexp.test(placa)) {
        return true;
    } else {
        return false;
    }
}

function EsNit(nit, cod) {
    var vpri, x, y, z, i, nit1, dv1;
    nit1 = nit;
    if (isNaN(nit1)) {

        //mensaje(1,'El valor digitado no es un numero valido');
        return true;

    } else {
        vpri = new Array(16);
        x = 0;
        y = 0;
        z = nit1.length;
        vpri[1] = 3;
        vpri[2] = 7;
        vpri[3] = 13;
        vpri[4] = 17;
        vpri[5] = 19;
        vpri[6] = 23;
        vpri[7] = 29;
        vpri[8] = 37;
        vpri[9] = 41;
        vpri[10] = 43;
        vpri[11] = 47;
        vpri[12] = 53;
        vpri[13] = 59;
        vpri[14] = 67;
        vpri[15] = 71;
        for (i = 0; i < z; i++) {
            y = (nit1.substr(i, 1));
            //document.write(y+"x"+ vpri[z-i] +":");
            x += (y * vpri[z - i]);
            //document.write(x+"<br>");
        }
        y = x % 11
            //document.write(y+"<br>");
        if (y > 1) {
            dv1 = 11 - y;
        } else {
            dv1 = y;
        }
        //document.form1.dv.value=dv1;

        if (parseInt(cod) != dv1) {
            return true;
        } else {
            return false;
        }
    }
}


function plrealoder() {

    $.ajax({
        mimeType: 'text/html; charset=utf-8',
        url: "./codex/controllers/LoginController.php",
        method: "POST",
        async: true,
        data: { plrealoder: "c" },
        dataType: "html",
        success: function(respuesta) {

            //Accion diferente al otro AJAX

            $("#preloader").html(respuesta);
            $("#preloader").modal('show');

        },
        error: function(jqXHR, textStatus, errorThrown) {
            LoadAjaxContent('404');
        }
    });
}