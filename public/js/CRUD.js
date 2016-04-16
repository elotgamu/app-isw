

  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    }
  });


$("#btnadd").click(function(){
  var nombre= $("#txtcategoria").val();
  var descripcion= $("#txtdescripcion").val();
  var ruta="/mi_contenido/categoria/agregar";
  var datos={name: nombre, descrip: descripcion};
  
  $.ajax({
    url:ruta,
    type:'POST',
    dataType:'json',
    data:datos,
    success:function(){
      $("#notificaciones").fadeIn();
      $("#addcategoria").modal('toggle');
      $("#txtcategoria").val('');
      $("#txtdescripcion").val('');
      cargar_categorias();
    }
  });
});

$("#btnproducto").click(function(){
  var nombre= $("#txtproducto").val();
  var precio= $("#txtprecio").val();
  var id_categoria=$("#cbcategorias").val();
  var ruta="/mi_contenido/producto/agregar";
  var datos={name: nombre, precio: precio, id_catego:id_categoria};
  
  $.ajax({
    url:ruta,
    type:'POST',
    dataType:'json',
    data:datos,
    success:function(res){
      $("#notificaciones").append(res.mensaje);
      $("#notificaciones").fadeIn();
      $("#addproducto").modal('toggle');
      $("#txtproducto").val('');
      $("#txtprecio").val('');
      $("#cbcategorias").val('')
      cargar_categorias();
    }
  });
});

$("#btnupdate_cate").click(function(){
  var nombre= $("#txtcategoria_update").val();
  var descripcion= $("#txtdescripcion_update").val();
  var id_categ= $("#id_categoria").val();
  
  var ruta="/mi_contenido/Categorias/"+id_categ;
  var datos={name: nombre, descrip: descripcion};
  
  $.ajax({
    url:ruta,
    type:'PUT',
    dataType:'json',
    data:datos,
    success:function(){
      $("#notificaciones").fadeIn();
      $("#updatecategoria").modal('toggle');
      cargar_categorias();
    }
  });
});




function info_categoria(btn)
{
  var ruta="mi_contenido/Categorias/"+btn.value+"/modificar";
  $.get(ruta, function(res){
        $("#txtdescripcion_update").val(res.descripcion_categoria);
        $("#txtcategoria_update").val(res.nombre_categoria);
        $("#id_categoria").val(res.codigo_categoria);
  });
}

function cargar_categorias(){
    var dt_categorias = $("#lista_categorias");
    var cb_categorias=$("#cbcategorias");
    var ls_producto=$("#lista_producto");
    $("#cbcategorias").empty();
    cb_categorias.append(
            "<option value=''>Seleccione una categoria</option>"
    );
    $("#lista_categorias").empty();
    var ruta="mi_contenido/listar";
    
      $.get(ruta,function(res){
        $(res).each(function(key,value){
        
          dt_categorias.append(
          "<div class='item col-lg-11'>"+
          "<div class='thumbnail'>"+      
              "<div class='caption'>"+
              "<div class='row'>"+
              "<div class='col-lg-7'>"+
                  "<h4 class='group inner list-group-item-text'>"+value.nombre_categoria+"</h4>"+
              "</div>"+
              "<div class='col-lg-4'>"+
                "<button class='btn btn-info btn-sm' href='#updatecategoria' data-toggle='modal' value="+value.codigo_categoria+" OnClick='info_categoria(this)'>Editar</button>"+
              "</div>"+
          "</div>"+
          "</div>"+
          "</div>"+
          "</div>"
          );
          
          cb_categorias.append(
            "<option value=" + value.codigo_categoria + ">" + value.nombre_categoria + "</option>"
          );
          
              var ruta2="/mi_contenido/categoria/"+value.codigo_categoria+"/producto/listar";
              $.get(ruta2,function(res1){
                      $(res1).each(function(key1,value1){
                          ls_producto.append(
                          "<div class='item col-lg-11'>"+
                          "<div class='thumbnail'>"+      
                              "<div class='caption navbar-custom'>"+
                              "<div class='row'>"+
                                  "<div class='col-lg-8'>"+
                                      "<h4 class='group inner list-group-item-text'> Nombre: "+value1.nombre_producto+"</h4>"+
                                      "<p class='lead'> Precio "+value1.precio_producto+"</p>"+
                                  "</div>"+
                                  "<div class='col-lg-3'>"+
                                        "<br/>"+
                                        "<button class='btn btn-info btn-sm'  value="+value.codigo_producto+">Editar</button>"+
                                  "</div>"+
                                  
                          "</div>"+
                          "</div>"+
                          "</div>"+
                          "</div>"
                          );
                    });
          
            });
        });       
                 
      });
}


$(document).ready(function(){  

      cargar_categorias();
});