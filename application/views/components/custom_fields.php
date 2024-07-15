<?php
/**
 * Local variables.
 *
 * @var bool $disabled (false)
 */

$disabled = $disabled ?? false; ?>

<?php for ($i = 1; $i <= 5; $i++): ?>
    <?php if (setting('display_custom_field_' . $i)): ?>
        <div class="mb-3">
            <label for="custom-field-<?= $i ?>" class="form-label">
                <?= setting('label_custom_field_' . $i) ?: lang('custom_field') . ' #' . $i ?>
                <?php if (setting('require_custom_field_' . $i)): ?>
                    <span class="text-danger" <?= $disabled ? 'hidden' : '' ?>>*</span>
                <?php endif; ?>
            </label>
            <input type="text" id="custom-field-<?= $i ?>"
                   class="<?= setting('require_custom_field_' . $i) ? 'required' : '' ?> form-control"
                    oninput="checkRut(this)"
                   maxlength="120" <?= $disabled ? 'disabled' : '' ?> autocomplete="off" minlength="9" maxlength="10"
                   pattern="\d{3,8}-[\d|kK]{1}" placeholder="Ingresar rut con guión y sin puntos" />
        </div>
    <?php endif; ?>
<?php endfor; ?>

<script>
  // Capturando el DIV alerta y mensaje

  var alerta = document.getElementById("alerta");
  var mensaje = document.getElementById("mensaje");

  // Permite solo numeros en el imput

  function isNumber(evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode === 75)
      return false;

    return true;
  }

  function checkRut(rut) {
    // Obtiene el valor ingresado quitando puntos y guion.

    var valor = clean(rut.value);

    // Divide el valor ingresado en digito verificador y resto del RUT.

    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();

    // Separa con un guion el cuerpo del digito verificador.

    rut.value = format(rut.value);

    // Si no cumple con el minimo por ejemplo (x.xxx.xxx)

    if (cuerpo.length < 7) {
      rut.setCustomValidity("RUT Incompleto");
      alerta.classList.remove("alert-success", "alert-danger");
      alerta.classList.add("alert-info");
      mensaje.innerHTML =
        "Ingresó un RUT muy corto, el RUT debe ser mayor a 7 Dígitos. Ej: x.xxx.xxx-x";
      return false;
    }

    // Calcular digito verificador "metodo del modulo 11"

    suma = 0;
    multiplo = 2;

    // Para cada digito del cuerpo

    for (i = 1; i <= cuerpo.length; i++) {
      // Obtiene su producto con el multiplo correspondiente

      index = multiplo * valor.charAt(cuerpo.length - i);

      // Sumar al contador general
      suma = suma + index;

      // Consolida multiplos dentro del rango [2,7]

      if (multiplo < 7) {
        multiplo = multiplo + 1;
      } else {
        multiplo = 2;
      }
    }

    // Calcular digito verificador en base al modulo 11

    dvEsperado = 11 - (suma % 11);

    // Casos especiales de presentar 0 y K

    dv = dv == "K" ? 10 : dv;
    dv = dv == 0 ? 11 : dv;

    // Valida que el Cuerpo coincide con el digito verificador

    if (dvEsperado != dv) {
      rut.setCustomValidity("RUT Inválido");

      alerta.classList.remove("alert-info", "alert-success");
      alerta.classList.add("alert-danger");
      mensaje.innerHTML =
        "El RUT ingresado: " + rut.value + " Es <strong>INCORRECTO</strong>.";

      return false;
    } else {
      rut.setCustomValidity("");
      alerta.classList.remove("d-none", "alert-danger");
      alerta.classList.add("alert-success");
      mensaje.innerHTML =
        "El RUT ingresado: " + rut.value + " Es <strong>CORRECTO</strong>.";
      return true;
    }
  }

  function format(rut) {
    // Realiza el formateo de puntos y guion al estar ingresando el rut

    rut = clean(rut);

    var result = rut.slice(-4, -1) + "-" + rut.substr(rut.length - 1);
    for (var i = 4; i < rut.length; i += 3) {
      result = rut.slice(-3 - i, -i) + "." + result;
    }

    return result;
  }

  function clean(rut) {
    // Elimina los caracteres especiales y/o letras de forma automatica en el ingreso del Rut

    return typeof rut === "string"
      ? rut.replace(/^0+|[^0-9kK]+/g, "").toUpperCase()
      : "";
  }
</script>