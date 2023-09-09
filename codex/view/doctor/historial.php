<?php
while ($obj = $this->model->recorrer($rs)): ?>
    <h1>Crear Historial de <strong>
            <?PHP echo $obj['Nombre']; ?>
        </strong> </h1>
    <?PHP
endwhile;
?>
<div id="Mensaje"></div>
<div class="mb-5 container card card-body" style="width: 400px; height: auto;">
    <form method="post" id="datos">
        <div class="form-group">
            <label for="antecedentes">Antecedentes Médicos:</label>
            <textarea class="form-control" id="antecedentes" name="antecedentes" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="alergias">Alergias:</label>
            <input type="text" class="form-control" id="alergias" name="alergias">
        </div>
        <div class="form-group">
            <label for="medicamentos">Medicamentos Actuales:</label>
            <input type="text" class="form-control" id="medicamentos" name="medicamentos">
        </div>
        <div class="form-group">
            <label for="procedimientos">Historial de Procedimientos:</label>
            <input type="text" class="form-control" id="procedimientos" name="procedimientos">
        </div>
        <div class="form-group">
            <label for="enfermedades">Historial de Enfermedades Familiares:</label>
            <input type="text" class="form-control" id="enfermedades" name="enfermedades">
        </div>
        <div class="form-group">
            <label for="vacunas">Historial de Vacunas:</label>
            <input type="text" class="form-control" id="vacunas" name="vacunas">
        </div>
        <div class="form-group">
            <label for="notas">Notas Adicionales:</label>
            <textarea class="form-control" id="notas" name="notas" rows="3"></textarea>
        </div>
        <button type="button" onclick="guardar()" class="btn btn-primary">Guardar</button>
    </form>
</div>

<script>
    function guardar() {
        var parametros = new FormData($('#datos')[0]);
        $.ajax({
            mimeType: 'text/html; charset=utf-8',
            url: './?c=paciente&a=guardarHistorial',
            method: 'POST',
            async: true,
            data: parametros,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (respuesta) {
                if (parseInt(respuesta.success) == 3) {
                    $('#datos')[0].reset();
                    $("#Mensaje").html(mensaje(respuesta))
                    return;
                }
                return;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                dialogo(7, 'ERROR');
                return;
            }
        });
    }
    function mensaje(respuesta) {
        return `
        <p > ${respuesta.response}</p > 
        `
    }

</script>