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
// for (let index = 0; index < nivel1.length; index++) {
//   console.log(nivel1[index] + index);

// $(".ch-1").click(function () {
//   // aquí empieza la funcionalidad para dar selección dentro de una celda
//   $(".ch1").prop("checked", $(this).prop("checked"));
//   // $(".ch1").prop('disabled', false);
//   // if (!$(this).prop("checked")) {
//   //     $('.ch1').prop("disabled", true);
//   // }
// });

// $(".ch1").click(function () {
//   if (!$(this).prop("checked")) {
//     $(".ch-1").prop("checked", false);
//   }
// });

// $(".ch-2").click(function () {
//   $(".ch2").prop("checked", $(this).prop("checked"));
// });

// $(".ch2").click(function () {
//   if (!$(this).prop("checked")) {
//     $(".ch-2").prop("checked", false);
//   }
// });
//   Aquí termina la selección de celda
// }

/* Aquí termina la funcionalidad de php con js */

/*****************************************************/
/* Aquí comienza la funcionalidad con js */

function obtener_data() {
  var tabla_tbody = "";

  $.ajax({
    type: "GET",
    url: url + "mostrar",
    // data: "data",
    dataType: "json",  
    success: function (data) {
        //Extraer data con map,forEach => prefiero esta forma 
        data.map((datos,i) =>{
            tabla_tbody += `
        <tr>
          <td><input class="chall ch-${datos.product_id}" id="nivel[0]-${i}" type="checkbox"  /></td>
          <td><input class="chall ch${datos.product_id}" id="nivel[0][0]-${i}" type="checkbox"  /></td>
          <td><input class="chall ch${datos.product_id}" id="nivel[0][1]-${i}" type="checkbox"  /></td>
          <td><input class="chall ch${datos.product_id}" id="nivel[0][2]-${i}" type="checkbox"  /></td>
            <td>
                <a class="css-boton boton-primario" href="${url}product/edit/${datos.product_id}">Edit</a>
                <a class="css-boton boton-advertencia" href="${url}product/delete/${datos.product_id}">Delete</a>
            </td>
        </tr>
            `;
        });

        // Extraer data con el map jquery 
    //   $.map(data, function (datos, i) {
    //     // console.log(datos.product_name);
    //     tabla_tbody += `
    //     <tr>
    //         <td>${datos.product_id}</td>
    //         <td>${datos.product_name}</td>
    //         <td>${datos.product_price}</td>
    //         <td>
    //             <a class="css-boton boton-primario" href="${url}product/edit/${datos.product_id}">Edit</a>
    //             <a class="css-boton boton-advertencia" href="${url}product/delete/${datos.product_id}">Delete</a>
    //         </td>
    //     </tr>
    //         `;
    //   });
      $("#tabla_tbody").html(tabla_tbody);
    },
  });
}

obtener_data();
/* Aquí termina la funcionalidad con js */
$(".ch-2").click(function () {
  $(".ch2").prop("checked", $(this).prop("checked"));
});

$(".ch2").click(function () {
  if (!$(this).prop("checked")) {
    $(".ch-2").prop("checked", false);
  }
});