/* Aquí comienza la funcionalidad con php y js*/

function check(num) {
  alert(num);
}
// Funcionalidad cuando está seleccionado en todos
$("#selectAll").click(function () {
  $(".chall").prop("checked", $(this).prop("checked"));
});

$(".chall").click(function () {
  if (!$(this).prop("checked")) {
    $("#selectAll").prop("checked", false);
  }
});

// aqui termina funcionalidad para seleccion multiple

/* Aquí termina la funcionalidad de php con js */

/*****************************************************/
/* Aquí comienza la funcionalidad con js */

function obtener_data() {
  var tabla_tbody = "";
  var alm = "";
  var alm_contador = "";
  const contador = 1;
  $.ajax({
    type: "GET",
    url: url + "mostrar",
    // data: "data",
    dataType: "json",
    success: function (data) {
      //Extraer data con map,forEach => prefiero esta forma
      data.map((datos, i) => {
        alm += "ch-" + datos.product_id + ",";
        alm_contador += contador + i + ",";

        tabla_tbody += `
        <tr>
        
          <td><input class="chall ch-${cheq_pc(
            datos.product_id
          )} " id="nivel[0]-${i}" type="checkbox"  /></td>
          <td><input class=" ch${cheq_pc(
            datos.product_id
          )}" id="nivel[0][0]-${i}" type="checkbox"  /></td>
          <td><input class=" ch${cheq_pc(
            datos.product_id
          )}" id="nivel[0][1]-${i}" type="checkbox"  /></td>
          <td><input class=" ch${cheq_pc(
            datos.product_id
          )}" id="nivel[0][2]-${i}" type="checkbox"  /></td>
            <td>
                <a class="css-boton boton-primario" href="${url}product/edit/${
          datos.product_id
        }">Edit</a>
                <a class="css-boton boton-advertencia" href="${url}product/delete/${
          datos.product_id
        }">Delete</a>
            </td>
        </tr>
            `;
      });

      //Lo almaceno en un arreglo y filtro la cadena vacía
      let arr_contador = alm_contador.split(",").filter((x) => x);
      let arr = alm.split(",").filter((x) => x);
      console.log(arr_contador);
      console.log(arr);
      $("#tabla_tbody").html(tabla_tbody);
    },
  });
}

obtener_data();
//Asociar eventos a elementos creados dinámicamente con jQuery
function cheq_pc(id_chq) {
  $(document).on("click", `.ch-${id_chq}`, function () {
    $(`.ch${id_chq}`).prop("checked", $(this).prop("checked"));
    if (!$(this).prop("checked")) {
      $(`.ch${id_chq}`).prop("disabled", true);
    }else{
      $(`.ch${id_chq}`).prop("disabled", false);
    }
  });

  $(document).on("click", `.ch${id_chq}`, function () {
    if (!$(this).prop("checked")) {
      $(`.ch-${id_chq}`).prop("checked", false);
    }
  });

  return id_chq;
}
