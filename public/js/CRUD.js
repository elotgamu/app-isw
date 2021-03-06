$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    }
  });


$("#btnadd").click(function(){
  var nombre= $("#txtcategoria").val();
  var descripcion= $("#txtdescripcion").val();

  // comento ya que ya no obtengo el negocio
  //var negocio= $("#negocio").val();
  //var ruta="/mi_contenido/categoria/agregar";
  var ruta="/mi_contenido/menu/categoria/agregar";
  if (nombre=='')
  {
      smoke.alert('No ha ingresado el nombre de la nueva promoción ¬¬');
      return;
  }

  if (descripcion=='')
  {
      smoke.alert('Ingrese una descripción de la categoría ¬¬');
      return;
  }
  //comento
  //var datos={name: nombre, descrip: descripcion, nego: negocio};

  var datos={name: nombre, descrip: descripcion};
  $.ajax({
    url:ruta,
    type:'POST',
    dataType:'json',
    data:datos,
    success:function(res){
    $("#notificaciones").append(res.mensaje);
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
  if (id_categoria=='')
  {
    smoke.alert('Especifique la categoría a la que pertenece este producto');
    return;
  }
  if (nombre=='')
  {
    smoke.alert('¿Producto sin nombre?... Lo ha olvidado verdad ¬¬');
    return;
  }

  /*
  * Aqui me falta validar la insercion de valores numericos
  */
  if (precio=='')
  {
    smoke.alert('A no ser que este producto sea una cortesía, indique su precio');
    return;
  }
  //var ruta="/mi_contenido/producto/agregar";
  var ruta="/mi_contenido/menu/producto/agregar";
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
      $("#cbcategorias").val('');
      cargar_categorias();
    }
  });
});

$("#btnupdate_cate").click(function(){
  var nombre= $("#txtcategoria_update").val();
  var descripcion= $("#txtdescripcion_update").val();
  var id_categ= $("#id_categoria").val();

  //var ruta="/mi_contenido/Categorias/"+id_categ;
  var ruta="/mi_contenido/menu/categoria/"+id_categ;
  var datos={name: nombre, descrip: descripcion};

  $.ajax({
    url:ruta,
    type:'PUT',
    dataType:'json',
    data:datos,
    success:function(res){
    $("#notificaciones").append(res.mensaje);
    $("#notificaciones").fadeIn();
    /*$("#notificaciones").append(
        "<div class='alert alert-info alert-dismissable'>"+
             "<button type='button' class='close' data-dismiss='alert' >&times;</button>"+
                 res.mensaje+
         "</div>"
    );*/
    //$("#notificaciones").fadeIn();
     $("#updatecategoria").modal('toggle');
      cargar_categorias();
    }
  });
});


$("#btnsavepromocion").click(function(){

    var data = new FormData();
    var nombre_promocion=$("#txtnamepromo").val();
    var descrip_promo=$("#txtdescpromo").val();
    var fechainicio=new Date().toISOString().slice(0,10);
    var fechafinal=$("#dptfechahasta").val();
    if(nombre_promocion=='')
    {
        smoke.alert('Ingrese el nombre de la promoción');
        //alert("I am an alert box!");
        return;
    }
    if(descrip_promo=="")
    {
        smoke.alert('Ingrese una descripción para la promoción');
        return;
    }
    if(fechafinal=="")
    {
        smoke.alert('Ingrese la fecha en que expira la promoción');
        return;
    }
    //var data = new FormData();
    var name_archivo=$("#ruta_img_promo").text();
    data.append('archivo',$("#multipartFilePath")[0].files[0]);
    data.append('name',nombre_promocion);
    data.append('descrip',descrip_promo);
    data.append('fecha_ini',fechainicio);
    data.append('fecha_fin',fechafinal);
    data.append('ruta_archivo',name_archivo);
    //var ruta="/mi_contenido/promocion/agregar";
    var ruta="/mi_contenido/promociones/agregar";
    //var datos={name: nombre_promocion, descrip: descrip_promo, fecha_ini: fechainicio, fecha_fin: fechafinal,archivo:data,ruta_archivo:name_archivo};

    $.ajax({
      url:ruta,
      type:'POST',
      dataType:'json',
      data:data,
      processData: false,
      contentType: false,
      success:function(res){
        $("#notificaciones").append(res.mensaje);
        $("#notificaciones").fadeIn();
        $("#addpromocion").modal('toggle');
        $("#txtdescpromo").val('');
        $("#dptfechainicio").val('');
        $("#dptfechahasta").val('');
        $("#txtnamepromo").val('');
        $("#ruta_img_promo").text('');
        cargar_promociones();
      }
    });
});

$("#savepromoupdated").click(function () {
    var data_updater = new FormData();
    var name_promo_updated = $("#txtnamepromo_updated").val();
    var descrip_promo_updated = $("#txtdescpromo_updated").val();
    var fechafinal_updated=$("#dptfechahasta_updated").val();
    var name_flyer_updated = $("#ruta_img_promo_updated").text();
    var id_promo = $("#id_promocion").val();

    data_updater.append('archivo', $("#multipartFilePath_update")[0].files[0]);
    data_updater.append('name_updated', name_promo_updated);
    data_updater.append('desc_updated', descrip_promo_updated);
    data_updater.append('enddate_updated', fechafinal_updated);
    data_updater.append('updated_flyer', name_flyer_updated);
    //var ruta_updated = "/mi_contenido/promociones/"+id_promo;
    var ruta_updated = "promociones/"+id_promo;

    $.ajax({
        url: ruta_updated,
        type: 'POST',
        dataType: 'json',
        data: data_updater,
        processData: false,
        contentType: false,
        success: function (res) {
            $("#notificaciones").append(res.mensaje);
            $("#notificaciones").fadeIn();
            $("#updatepromo").modal('toggle');
            $("#txtnamepromo_updated").val('');
            $("#txtdescpromo_updated").val('');
            $("#dptfechahasta_updated").val('');
            $("#ruta_img_promo_updated").text('');
            cargar_promociones();
        }
    });
});

function info_categoria(btn)
{
  //var ruta="mi_contenido/Categorias/"+btn.value+"/modificar";
  var ruta="menu/categoria/"+btn.value+"/modificar";
  $.get(ruta, function(res){
        $("#txtdescripcion_update").val(res.descripcion_categoria);
        $("#txtcategoria_update").val(res.nombre_categoria);
        $("#id_categoria").val(res.codigo_categoria);
  });
}

function info_promocion(btn)
{
    //var url="mi_contenido/promocion/"+btn.value+"/modificar";
    var url="promociones/"+btn.value+"/modificar";
    $.get(url, function (res) {
        $("#txtnamepromo_updated").val(res.nombre_promo);
        $("#txtdescpromo_updated").val(res.descripcion_promo);
        $("#dptfechahasta_updated").val(res.valido_hasta);
        document.getElementById("volpromo_updated").src=res.img_promo;
        $("#id_promocion").val(res.id);
    });
}

/*$('#pop').click(function () {
    var sr = $(this).find('img').attr('src');
    $('#img_promo_preview').attr('src', sr);
    $('#previewpromo').modal('show');
});*/

/*$(".pop").on('click', function () {
    console.log("It works!");
    var sr = $(this).find('img').attr('src');
    //var sr = $(this).attr('src');
    console.log(sr);
    $("#promo_preview").attr('src', sr);
    $("#previewpromo").modal('show');
});*/

function sr_preview(imagen) {
    document.getElementById("promo_preview").src=imagen.src;
    $("#previewpromo").modal('show');
}

function cargar_promociones()
{
    var dt_promocion=$("#lista_promocion");
    //var ruta="mi_contenido/promocion/listar";
    var ruta="promociones/listar";
    $.get(ruta, function(res) {
        if(res.length>0)
        {
            dt_promocion.empty();
            $(res).each(function(key, value)
            {
                dt_promocion.append(
                    "<div class='item  col-xs-8 col-lg-6'>"+
                    "<div class='thumbnail'>"+
                        "<div class='caption'>"+
                        "<h4 class='group inner list-group-item-heading'>"+
                        value.nombre_promo+"</h4>"+
                        "</div>"+
                        "<img class='img-responsive' src='"+value.img_promo+"' height='400' width='400' value='"+value.img_promo+"' OnClick='sr_preview(this)'/>"+
                        "<div class='caption'>"+
                            "<button class='btn btn-primary' href='#updatepromo' data-toggle='modal' value="+value.id+" OnClick='info_promocion(this)'><span class='glyphicon glyphicon-pencil'></span> Editar</button>"+
                        "</div>"+
                    "</div>"+
                    "</div>"
                );
            });
        }
        else {
                dt_promocion.append("¡Aún no ha agregado ninguna promoción!");
        }
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
    ls_producto.empty();
    var ruta="menu/categoria/listar";

      $.get(ruta,function(res){
        var cantidad_cat=res.length;
        if(cantidad_cat>0)
        {
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
                    "<button class='btn btn-info btn-sm' href='#updatecategoria' data-toggle='modal' value="+value.codigo_categoria+" OnClick='info_categoria(this)'><span class='glyphicon glyphicon-pencil'></span> Editar</button>"+
                    "&nbsp"+"&nbsp"+
                    "<button class='btn btn-info btn-sm' href='#lsprodcat' data-toggle='modal' ' value="+value.codigo_categoria+" OnClick='ls_prods(this)'>Ver Productos</button>"+
                  "</div>"+
              "</div>"+
              "</div>"+
              "</div>"+
              "</div>"
              );

              cb_categorias.append(
                "<option value=" + value.codigo_categoria + ">" + value.nombre_categoria + "</option>"
              );

                  /*var ruta2="/mi_contenido/categoria/"+value.codigo_categoria+"/producto/listar";
                  $.get(ruta2,function(res1){
                          $(res1).each(function(key1,value1){
                              ls_producto.append(
                              "<div class='item col-lg-11'>"+
                              "<div class='thumbnail'>"+
                                  "<div class='caption navbar-custom'>"+
                                  "<div class='row'>"+
                                      "<div class='col-lg-8'>"+
                                          "<h4 class='group inner list-group-item-text'> Nombre: "+value1.nombre_producto+"</h4>"+
                                          "<p class='lead'> Precio: "+value1.precio_producto+"</p>"+
                                          "<p class='lead'>Categoria: "+value1.nombre_categoria+"</p>"+
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

                });*/
            });
        }
        else {
            dt_categorias.append('No hay resultados');
        }

      });
}

function ls_prods(btn){
    var ls_producto=$('#lista_producto');
    ls_producto.empty();
    //var ruta2="/mi_contenido/categoria/"+btn.value+"/producto/listar";
    var ruta2="/mi_contenido/menu/producto/"+btn.value+"/listar";

    $.get(ruta2,function(res1){
            $(res1).each(function(key1,value1){
                ls_producto.append(
                "<div class='item col-lg-12'>"+
                "<div class='thumbnail'>"+
                    "<div class='caption navbar-custom'>"+
                    "<div class='row'>"+
                        "<div class='col-lg-8'>"+
                            "<h4 class='group inner list-group-item-text'> Nombre: "+value1.nombre_producto+"</h4>"+
                            "<p class='lead'> Precio: "+value1.precio_producto+"</p>"+
                        "</div>"+
                        "<div class='col-lg-3'>"+
                              "<br/>"+
                              "<button class='btn btn-info btn-sm'  value="+value1.codigo_producto+">Editar</button>"+
                        "</div>"+
                "</div>"+
                "</div>"+
                "</div>"+
                "</div>"
                );
          });
  });
}

function nego() {
    ruta = '/mi_contenido/detalles';
    $.get(ruta,function(dt){
        $(dt).each(function(key, value){
            $("#detalles").append(value.descipcion_negocio);
            $("#negocio_numero").append(value.telefono_negocio);
            $("#negocio_email").append(value.email_negocio);
            $("#negocio_propietario").append(value.propietario_negocio)
            $("#contacto_ubicacion").append(value.ubicacion_negocio);
        });
    });
}

$("#menu").on('click', function(){
    //cargar_categorias();
});

$("#promociones").on('click', function(){
    //cargar_promociones();
    document.getElementById('dptfechahasta').readOnly = true;
});

$(document).ready(function(){
    //document.getElementById('dptfechahasta').readOnly = true;
         //$("#dptfechahasta").readOnly = true;
    nego();
    cargar_categorias();
    cargar_promociones();
});
