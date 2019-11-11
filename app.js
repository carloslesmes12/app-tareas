$(document).ready(function() {
  alert("jQuery esta cargado");

    let editar = false;
   
  $("#resultado").hide();
  obtenertareas();

  $("#buscar").keyup(function() {
    if ($("#buscar").val()) {
      let search = $("#buscar").val();
      $.ajax({
        url: "busqueda_de_tareas.php",
        type: "POST",
        data: { search: search },
        success: function(respuesta) {
          let datos = JSON.parse(respuesta);
          let modelo = "";
          datos.forEach(datos => {
            modelo += `<li>
                             ${datos.name}
                             <li>`  ;
          });

          $("#container").html(modelo);
          $("#resultado").show();
        }
      });
    }
  });

  $("#tarea-form").submit(function(e) {
    const datosPost = {
      name: $("#name").val(),
      description: $("#description").val(),
      id: $("#tareainput").val()
    };
        

       

    let url = editar=== false ? "adicionar_tareas.php":"tareas-edicion.php";

             console.log(url);


   
    $.post(url, datosPost, function(respuesta) {
      console.log(respuesta);
      obtenertareas();
      $("#tarea-form").trigger("reset");
    });
    e.preventDefault();
  });

  function obtenertareas() {
    $.ajax({
      url: "consultar_tareas.php",
      type: "GET",
      success: function(respuesta) {
        let tareas = JSON.parse(respuesta);
        let modelo = "";
        tareas.forEach(tareas => {
          modelo += `                      
                              <tr tareaid="${tareas.id}">
                              <td>${tareas.id}</td>
                              <td><a href="#" class="tarea-item">${tareas.name}<a></td>
                              <td>${tareas.descripcion}</td>
                              <td>
                                <button class="eliminar-tarea btn btn-danger">Eliminar</button>
                              </td>
                              </tr> `;
        });

        $("#tarea").html(modelo);
      }
    });
  }

  $(document).on("click", ".eliminar-tarea", function() {

    if (confirm('estas seguro de querer eliminarlo') ){

      let elemento = $(this)[0].parentElement.parentElement;
      let id =$(elemento).attr('tareaid');
      $.post('eliminar_tarea.php',{id},function(respuesta){
             console.log(respuesta); 
             obtenertareas();
      })
    }
  
  });

  $(document).on("click",".tarea-item", function () {
         let elemento=$(this)[0].parentElement.parentElement;
         let id=$(elemento).attr('tareaid');  
         $.post('editar_tarea.php',{id}, function(respuesta) {
            const tarea = JSON.parse(respuesta);
            $('#name').val(tarea.name);
            $('#description').val(tarea.descripcion);
            $('#tareainput').val(tarea.id);
            editar= true;
         });
     
  });
    

});
